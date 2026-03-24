"use client";

import { useState } from "react";
import { useCart } from "@/lib/cart-context";
import Link from "next/link";
import { useRouter } from "next/navigation";
import { supabase } from "@/lib/supabase";

export default function CartPage() {
  const { cart, removeFromCart, totalPrice, clearCart } = useCart();
  const router = useRouter();

  const [isCheckingOut, setIsCheckingOut] = useState(false);

  const handleCheckout = async () => {
    if (cart.length === 0) return;
    setIsCheckingOut(true);

    try {
      const { data: { user } } = await supabase.auth.getUser();
      if (!user) {
        router.push("/login");
        return;
      }

      // 1. Insert into 'pesanan'
      const { data: order, error: orderError } = await supabase
        .from("pesanan")
        .insert({
          user_id: user.id,
          total_harga: totalPrice,
          metode_pembayaran: "BitePay", // Default for now
          status: "proses",
        })
        .select()
        .single();

      if (orderError) throw orderError;

      // 2. Insert into 'detail_pesanan'
      const orderDetails = cart.map((item) => ({
        pesanan_id: order.id,
        produk_id: item.id,
        quantity: item.quantity,
        harga_satuan: item.harga,
      }));

      const { error: detailsError } = await supabase
        .from("detail_pesanan")
        .insert(orderDetails);

      if (detailsError) throw detailsError;

      // 3. Clear cart and redirect
      router.push("/cart/success");
    } catch (error: any) {
      alert("Gagal memproses pesanan: " + error.message);
    } finally {
      setIsCheckingOut(false);
    }
  };

  return (
    <div className="min-h-screen bg-gray-50 pb-20">
      <nav className="bg-white border-b border-gray-100 px-4 h-16 flex items-center justify-between sticky top-0 z-40">
        <Link href="/menu" className="flex items-center gap-2">
          <span className="text-xl">←</span>
          <span className="font-bold text-sm uppercase tracking-widest">Kembali ke Menu</span>
        </Link>
        <span className="font-black text-rose-600">KERANJANG SAYA</span>
        <div className="w-10"></div>
      </nav>

      <main className="max-w-3xl mx-auto px-4 py-8">
        {cart.length === 0 ? (
          <div className="text-center py-20 bg-white rounded-[2.5rem] shadow-sm border border-gray-100">
            <div className="text-6xl mb-4">🛒</div>
            <h2 className="text-xl font-bold text-gray-900">Keranjang Anda Kosong</h2>
            <p className="text-gray-500 mt-2">Ayo tambahkan beberapa makanan lezat!</p>
            <Link href="/menu" className="mt-6 inline-block px-8 py-3 bg-rose-600 text-white rounded-full font-bold shadow-lg shadow-rose-100 hover:bg-rose-700 transition-all active:scale-95">
              Lihat Menu
            </Link>
          </div>
        ) : (
          <div className="space-y-6">
            <div className="bg-white rounded-[2.5rem] shadow-sm border border-gray-100 overflow-hidden">
              <div className="p-6 border-b border-gray-50 flex justify-between items-center">
                <h2 className="font-black text-gray-900 uppercase tracking-tight">Item Pesanan</h2>
                <button onClick={clearCart} className="text-xs font-bold text-gray-400 hover:text-rose-600 transition-colors uppercase tracking-widest">Hapus Semua</button>
              </div>
              <div className="divide-y divide-gray-50">
                {cart.map((item) => (
                  <div key={item.id} className="p-6 flex items-center gap-6 group">
                    <div className="w-20 h-20 bg-rose-50 rounded-2xl overflow-hidden shadow-inner">
                      <img src={item.gambar || "/assets/img/LandingLogo.png"} alt={item.nama} className="w-full h-full object-cover group-hover:scale-110 transition-transform" />
                    </div>
                    <div className="flex-1">
                      <h3 className="font-bold text-gray-900 group-hover:text-rose-600 transition-colors">{item.nama}</h3>
                      <p className="text-sm text-gray-500">Rp {new Intl.NumberFormat("id-ID").format(item.harga)}</p>
                      <div className="mt-2 flex items-center gap-3">
                        <span className="text-xs font-bold bg-gray-100 text-gray-600 px-2 py-0.5 rounded-full">Qty: {item.quantity}</span>
                      </div>
                    </div>
                    <div className="text-right">
                      <p className="font-black text-gray-900">Rp {new Intl.NumberFormat("id-ID").format(item.harga * item.quantity)}</p>
                      <button onClick={() => removeFromCart(item.id)} className="mt-1 text-[10px] font-bold text-rose-500 hover:underline uppercase tracking-widest">Hapus</button>
                    </div>
                  </div>
                ))}
              </div>
            </div>

            <div className="bg-white rounded-[2.5rem] p-8 shadow-xl shadow-gray-200 border border-gray-100">
               <div className="space-y-4">
                  <div className="flex justify-between items-center text-sm font-medium text-gray-500">
                    <span>Subtotal</span>
                    <span>Rp {new Intl.NumberFormat("id-ID").format(totalPrice)}</span>
                  </div>
                  <div className="flex justify-between items-center text-sm font-medium text-gray-500">
                    <span>Biaya Layanan</span>
                    <span className="text-green-600 font-bold uppercase text-[10px] bg-green-50 px-2 rounded-full border border-green-100">Gratis</span>
                  </div>
                  <div className="pt-4 border-t border-gray-100 flex justify-between items-center">
                    <span className="text-xl font-black text-gray-900">Total</span>
                    <span className="text-2xl font-black text-rose-600">Rp {new Intl.NumberFormat("id-ID").format(totalPrice)}</span>
                  </div>
               </div>

               <button 
                onClick={handleCheckout}
                disabled={isCheckingOut}
                className="w-full mt-8 py-5 bg-rose-600 text-white rounded-[1.5rem] font-black shadow-2xl shadow-rose-200 hover:bg-rose-700 transition-all hover:-translate-y-1 active:scale-95 flex items-center justify-center gap-3 disabled:opacity-50"
               >
                 {isCheckingOut ? "MEMPROSES..." : "CHECKOUT SEKARANG"}
                 <span className="text-xl">➔</span>
               </button>
            </div>
          </div>
        )}
      </main>
    </div>
  );
}
