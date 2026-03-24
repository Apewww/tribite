"use client";

import { useEffect } from "react";
import { useCart } from "@/lib/cart-context";
import Link from "next/link";

export default function SuccessPage() {
  const { clearCart } = useCart();

  useEffect(() => {
    clearCart();
  }, [clearCart]);

  return (
    <div className="min-h-screen flex flex-col items-center justify-center bg-white px-4">
      <div className="max-w-md w-full text-center space-y-8 animate-in zoom-in duration-700">
        <div className="w-24 h-24 bg-rose-50 rounded-full flex items-center justify-center text-5xl mx-auto shadow-inner shadow-rose-100">
          🍱
        </div>
        <div className="space-y-4">
            <h1 className="text-4xl font-black text-gray-900 tracking-tight">PESANAN TERKIRIM!</h1>
            <p className="text-gray-500 font-medium">Terimakasih sudah melakukan pembelian! Pesanan Anda sedang diproses oleh tim kami.</p>
        </div>
        <div className="bg-rose-50 p-6 rounded-3xl border border-rose-100 space-y-2">
            <p className="text-xs font-bold text-rose-600 uppercase tracking-widest">Nomor Pesanan</p>
            <p className="text-2xl font-black text-gray-900 tracking-tighter">#TRB-{Math.floor(Math.random() * 900000) + 100000}</p>
        </div>
        <div className="flex flex-col gap-3">
            <Link href="/menu" className="w-full py-4 bg-gray-900 text-white rounded-2xl font-bold hover:bg-rose-600 transition-all active:scale-95 shadow-xl shadow-gray-200 flex items-center justify-center gap-2">
               Pesan Lagi ➔
            </Link>
            <Link href="/dashboard" className="w-full py-4 bg-white text-gray-900 border border-gray-100 rounded-2xl font-bold hover:bg-gray-50 transition-all active:scale-95">
               Ke Dashboard Sayat
            </Link>
        </div>
      </div>
    </div>
  );
}
