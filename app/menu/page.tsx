"use client";

import { useEffect, useState } from "react";
import { supabase } from "@/lib/supabase";
import Link from "next/link";
import { useCart } from "@/lib/cart-context";

interface Product {
  id: number;
  nama: string;
  deskripsi: string;
  harga: number;
  gambar: string;
  kategori_id: number;
  rating: number;
}

export default function MenuPage() {
  const [products, setProducts] = useState<Product[]>([]);
  const [loading, setLoading] = useState(true);
  const { addToCart, totalItems } = useCart();

  useEffect(() => {
    async function fetchProducts() {
      const { data, error } = await supabase
        .from("katalog")
        .select("*")
        .eq("status", "aktif");

      if (error) {
        console.error("Error fetching products:", error);
      } else {
        setProducts(data || []);
      }
      setLoading(false);
    }

    fetchProducts();
  }, []);

  return (
    <div className="min-h-screen bg-gray-50 pb-20">
      {/* Navbar Simple */}
      <nav className="bg-white border-b border-gray-100 px-4 h-16 flex items-center justify-between sticky top-0 z-40">
        <Link href="/" className="flex items-center gap-2">
          <div className="w-8 h-8 bg-rose-600 rounded-lg flex items-center justify-center text-white font-bold">T</div>
          <span className="font-bold">TRIBITE</span>
        </Link>
        <div className="flex items-center gap-4">
          <Link href="/cart" className="relative p-2 hover:bg-gray-50 rounded-full transition-colors">
            🛒
            {totalItems > 0 && (
              <span className="absolute top-0 right-0 w-4 h-4 bg-rose-600 text-white text-[10px] flex items-center justify-center rounded-full">
                {totalItems}
              </span>
            )}
          </Link>
          <Link href="/dashboard" className="p-2 hover:bg-gray-50 rounded-full transition-colors">👤</Link>
        </div>
      </nav>

      <main className="max-w-7xl mx-auto px-4 mt-8">
        <div className="mb-8">
          <h1 className="text-3xl font-extrabold text-gray-900">Menu Kami</h1>
          <p className="text-gray-500">Pilih makanan favorit Anda dan nikmati kelezatannya</p>
        </div>

        {loading ? (
          <div className="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            {[...Array(8)].map((_, i) => (
              <div key={i} className="bg-white rounded-3xl p-4 space-y-4 animate-pulse">
                <div className="aspect-square bg-gray-100 rounded-2xl"></div>
                <div className="h-4 bg-gray-100 rounded w-3/4"></div>
                <div className="h-4 bg-gray-100 rounded w-1/2"></div>
              </div>
            ))}
          </div>
        ) : (
          <div className="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            {products.map((product) => (
              <div key={product.id} className="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-xl hover:shadow-gray-200 transition-all group">
                <div className="aspect-square bg-rose-50 relative overflow-hidden">
                  <img
                    src={product.gambar || "/assets/img/LandingLogo.png"}
                    alt={product.nama}
                    className="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                  />
                  <div className="absolute top-3 left-3 bg-white/90 backdrop-blur-md px-2 py-1 rounded-full text-[10px] font-bold text-rose-600 shadow-sm">
                    ⭐ {product.rating || 4.5}
                  </div>
                </div>
                <div className="p-4 space-y-1">
                  <h3 className="font-bold text-gray-900 group-hover:text-rose-600 transition-colors uppercase text-sm truncate">
                    {product.nama}
                  </h3>
                  <p className="text-xs text-gray-500 line-clamp-2 min-h-[2.5rem]">
                    {product.deskripsi || "Lezat dan bergizi, dimasak dengan bahan pilihan."}
                  </p>
                  <div className="pt-2 flex items-center justify-between">
                    <span className="font-extrabold text-rose-600">
                      Rp {new Intl.NumberFormat("id-ID").format(product.harga)}
                    </span>
                    <button 
                      onClick={() => addToCart(product)}
                      className="w-8 h-8 bg-gray-900 text-white rounded-lg flex items-center justify-center hover:bg-rose-600 transition-all active:scale-95 shadow-md"
                    >
                      +
                    </button>
                  </div>
                </div>
              </div>
            ))}
          </div>
        )}

        {products.length === 0 && !loading && (
          <div className="text-center py-20 bg-white rounded-3xl border border-dashed border-gray-200">
             <p className="text-gray-500">Belum ada menu tersedia.</p>
             <p className="text-xs text-gray-400 mt-1">Pastikan tabel `katalog` di Supabase sudah terisi.</p>
          </div>
        )}
      </main>
    </div>
  );
}
