"use client";

import { useEffect, useState } from "react";
import { supabase } from "@/lib/supabase";
import Link from "next/link";
import { useCart } from "@/lib/cart-context";

import { Navbar } from "@/components/navbar";
import { Footer } from "@/components/footer";

interface Product {
  id: number;
  nama: string;
  deskripsi: string;
  harga: number;
  gambar: string;
  kategori_id: number;
  rating: number;
}

export const dynamic = "force-dynamic";

export default function MenuPage() {
  const [products, setProducts] = useState<Product[]>([]);
  const [categories, setCategories] = useState<any[]>([]);
  const [loading, setLoading] = useState(true);
  const [search, setSearch] = useState("");
  const [selectedCat, setSelectedCat] = useState("all");
  const { addToCart } = useCart();

  useEffect(() => {
    async function fetchData() {
      const [{ data: prodData }, { data: catData }] = await Promise.all([
        supabase.from("katalog").select("*").eq("status", "aktif"),
        supabase.from("kategori").select("*")
      ]);

      setProducts(prodData || []);
      setCategories(catData || []);
      setLoading(false);
    }
    fetchData();
  }, []);

  const filteredProducts = products.filter(p => {
    const matchesSearch = p.nama.toLowerCase().includes(search.toLowerCase());
    const matchesCategory = selectedCat === "all" || p.kategori_id === parseInt(selectedCat);
    return matchesSearch && matchesCategory;
  });

  return (
    <div className="min-h-screen bg-gray-50 pb-20">
      <Navbar />

      <main className="max-w-7xl mx-auto px-4 mt-24">
        <div className="flex flex-col md:flex-row justify-between items-start md:items-end gap-6 mb-12">
            <div className="max-w-md w-full">
              <h1 className="text-4xl font-black text-gray-900 tracking-tight">Menu Kami</h1>
              <p className="text-gray-500 font-medium mt-1 text-sm">Pilih makanan favorit Anda dan nikmati kelezatannya.</p>
              
              <div className="mt-8 relative group">
                <input 
                    type="text" 
                    placeholder="Cari burger, nasi, atau lainnya..." 
                    className="w-full bg-white border border-gray-100 rounded-2xl px-6 py-4 shadow-sm focus:outline-none focus:ring-2 focus:ring-rose-200 transition-all pr-12 font-medium text-sm"
                    value={search}
                    onChange={(e) => setSearch(e.target.value)}
                />
                <span className="absolute right-6 top-1/2 -translate-y-1/2 text-xl opacity-40 group-focus-within:opacity-100 transition-opacity">🔍</span>
              </div>
            </div>

            <div className="flex flex-wrap gap-2">
                <button 
                    onClick={() => setSelectedCat("all")}
                    className={`px-6 py-3 rounded-2xl text-[10px] font-black uppercase tracking-widest transition-all ${
                        selectedCat === "all" ? "bg-rose-600 text-white shadow-lg shadow-rose-100" : "bg-white text-gray-500 hover:bg-gray-100"
                    }`}
                >
                    Semua
                </button>
                {categories.map(cat => (
                    <button 
                        key={cat.id}
                        onClick={() => setSelectedCat(cat.id.toString())}
                        className={`px-6 py-3 rounded-2xl text-[10px] font-black uppercase tracking-widest transition-all ${
                            selectedCat === cat.id.toString() ? "bg-rose-600 text-white shadow-lg shadow-rose-100" : "bg-white text-gray-500 hover:bg-gray-100"
                        }`}
                    >
                        {cat.nama}
                    </button>
                ))}
            </div>
        </div>

        <div className="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
          {loading ? (
             [...Array(8)].map((_, i) => (
                <div key={i} className="bg-white rounded-[2.5rem] h-80 animate-pulse border border-gray-100"></div>
             ))
          ) : filteredProducts.map((product) => (
              <div key={product.id} className="bg-white rounded-[2.5rem] shadow-sm border border-gray-100 overflow-hidden hover:shadow-2xl hover:shadow-rose-100/50 transition-all group flex flex-col">
                <div className="aspect-square bg-rose-50 relative overflow-hidden">
                  <img
                    src={product.gambar || "/assets/img/LandingLogo.png"}
                    alt={product.nama}
                    className="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700 ease-out"
                  />
                  <div className="absolute top-4 left-4">
                     <span className="bg-white/90 backdrop-blur-md px-3 py-1.5 rounded-xl text-[10px] font-black uppercase tracking-widest shadow-sm">
                        ⭐ {product.rating || 4.5}
                     </span>
                  </div>
                </div>
                <div className="p-6 flex-1 flex flex-col justify-between">
                  <div>
                    <h3 className="text-sm font-black text-gray-900 group-hover:text-rose-600 transition-colors uppercase truncate">{product.nama}</h3>
                    <p className="text-gray-400 text-xs mt-2 line-clamp-2 leading-relaxed font-medium">{product.deskripsi || "Lezat dan bergizi, dimasak dengan bahan pilihan."}</p>
                  </div>
                  <div className="mt-6 flex items-center justify-between gap-4">
                    <p className="font-black text-base tracking-tighter text-rose-600">Rp {new Intl.NumberFormat("id-ID").format(product.harga)}</p>
                    <button
                      onClick={() => addToCart({ ...product, quantity: 1 })}
                      className="w-10 h-10 bg-gray-950 text-white rounded-xl flex items-center justify-center hover:bg-rose-600 transition-all active:scale-90 shadow-xl shadow-gray-200"
                    >
                      +
                    </button>
                  </div>
                </div>
              </div>
          ))}
        </div>

        {filteredProducts.length === 0 && !loading && (
          <div className="text-center py-32 bg-white rounded-[3rem] border border-dashed border-gray-200">
             <p className="text-gray-400 font-bold uppercase tracking-widest text-sm">Tidak ditemukan</p>
             <p className="text-xs text-gray-400 mt-2">Coba kata kunci lain atau kategori yang berbeda.</p>
          </div>
        )}
      </main>

      <Footer />
    </div>
  );
}
