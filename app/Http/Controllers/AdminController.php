<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Customer;
use App\Models\Sale;
use App\Models\DetailSale;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;



class AdminController extends Controller
{
    public function index()
    {
        $title = "Dashboard";
        return view('admin.dashboard', compact('title'));
    }

    public function indexProduct()
    {
        $title = "Product";
        $product = Product::all();
        return view('admin.product.index', compact('title', 'product'));
    }

    public function createProduct()
    {
        $title = "Product";
        return view('admin.product.create', compact('title'));
    }

    public function storeProduct(Request $request)
    {
        $product = new Product();
        $product->NmProduct = $request->NmProduct;
        $product->Harga = $request->Harga;
        $product->Stok = $request->Stok;
        $product->save();
        return redirect()->route('indexProduct')->with('success','Product Updated');
    }

    public function editProduct($id)
    {
        $product = Product::findOrFail($id);
        $title = "Product";
        return view('admin.product.edit', compact('title', 'product'));
    }

    public function updateProduct(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->NmProduct = $request->NmProduct;
        $product->Harga = $request->Harga;
        $product->update();
        return redirect()->route('indexProduct')->with('success','Product Updated');
    }
    
    public function deleteProduct($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('indexProduct')->with('success','Product Deleted');
    }

    public function indexSale()
    {
        $title = "Sale";
        $sale = Sale::all();
        return view('admin.sale.index', compact('title', 'sale'));
    }
    public function createSale()
    {
        $title = "Sale";
        $chProduct = Product::all();
        return view('admin.sale.create', compact('title', 'chProduct'));
    }
    public function storeSale(Request $request)
    {
        $cust = Customer::Create([
            'NmCust' => $request->NmCust,
            'Address' => $request->Address,
            'Phone' => $request->Phone
        ]);
        $sale = Sale::Create([
            'TglSale' => $request->TglSale,
            'cust_id' => $cust->id
        ]);

        $totalPrice = 0;
        for ($i = 0; $i < count($request->product_id); $i++) {
            $product = Product::findOrFail($request->product_id[$i]);
            $subtotal = $product->Harga * $request->JmlProduct[$i];
            $saleDetail = DetailSale::Create([
                'sale_id' => $sale->id,
                'product_id' => $request->product_id[$i],
                'JmlProduct' => $request->JmlProduct[$i],
                'Subtotal' => $subtotal 
            ]);
            $totalPrice += $subtotal;
            $product->update([
                'Stok' => $product->Stok - $request->JmlProduct[$i]
            ]);
        }
        $sale->update(['Harga' => $totalPrice]);
        $sale->update(['TtlPrice' => $totalPrice]);
        return redirect()->route('indexSale')->with('Success', 'Sale Created');
    }
    public function detailSale($id)
    {
        $title = "Sale";
        $saleDetail = DetailSale::where('sale_id', $id)->get();
        return view('admin.sale.detail', compact('title', 'saleDetail', 'id'));
    }

    public function exportPDF($id)
   {
    $sale = Sale::where('id', $id)->first();
    $pdf = PDF::loadView('admin.sale.invoice', compact('sale'));

    return $pdf->download('detail_penjualan_'.$id.'.pdf');
    }

    public function deleteSale($id)
    {
        $sale = Sale::findOrFail($id);
        $sale->delete();
        return redirect()->route('indexSale')->with('success','Sale Deleted');
    }

    public function indexUser()
    {
        $user = User::all();
        $title = "User";
        return view('admin.user.index', compact('user', 'title'));
    }

    public function createUser()
    {
        $title = "User";
        return view('admin.user.form', compact('title'));
    }

    public function storeUser(Request $request)
    {
        $validationErrors = $request->validate([
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|string|min:8',
            'role' => 'required|string|in:admin,petugas'
        ]);

        $data = $request->only('email', 'password', 'role');
        $data['password'] = bcrypt($data['password']);
        $user = User::create($data);
        

        return redirect()->route('indexUser')->with('Succes', 'User Created!');
    }

    public function editUser($id)
    {
        $user = User::find($id);
        $title = "User";

        if(!$user) {
            return redirect()->route('indexUser')->with('Errors', 'User not Found!');
        }

        return view('admin.user.form', compact('user', 'title'));
    }

    public function updateUser(Request $request, $id)
    {
        $request->validate([
            'email' => 'required|string|email',
            'role' => 'required|string|in:admin,petugas'
        ]);
        $data = $request->only('email', 'role');

        if ($request->password) {
            $data['password'] = bcrypt($request->password);
        }

        $user = User::findOrFail($id);
        $user->update($data);

        return redirect()->route('indexUser')->with('Success', 'User Updated!');
    }

    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('indexUser')->with('Success', 'User Deleted!');
    }
    



   
}
