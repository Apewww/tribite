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
    <div className="min-h-screen bg-[#fafafa] pb-20">
      <Navbar />

      <main className="max-w-7xl mx-auto px-4 mt-32">
        {/* Header Section */}
        <div className="flex flex-col md:flex-row justify-between items-start md:items-end gap-8 mb-16">
            <div className="max-w-xl w-full">
              <div className="inline-flex items-center gap-2 px-3 py-1 bg-rose-50 rounded-full border border-rose-100 mb-4">
                  <span className="text-[10px] font-black uppercase tracking-widest text-rose-600">Terfavorit</span>
              </div>
              <h1 className="text-5xl font-black text-gray-900 tracking-tighter leading-none">Pilih Menu <br /> Kesukaanmu.</h1>
              <p className="text-gray-500 font-medium mt-4 text-sm max-w-sm leading-relaxed">Ribuan rasa dalam satu genggaman. Pesan sekarang dan nikmati keajaiban rasa Tribite.</p>
              
              <div className="mt-10 relative group max-w-md">
                <input 
                    type="text" 
                    placeholder="Cari makanan yang kamu mau..." 
                    className="w-full bg-white border border-gray-100 rounded-3xl px-8 py-5 shadow-2xl shadow-gray-100 focus:outline-none focus:ring-4 focus:ring-rose-50 transition-all pr-14 font-medium text-sm"
                    value={search}
                    onChange={(e) => setSearch(e.target.value)}
                />
                <span className="absolute right-6 top-1/2 -translate-y-1/2 text-xl opacity-40 group-focus-within:opacity-100 transition-opacity">🔍</span>
              </div>
            </div>

            <div className="flex flex-wrap gap-3 bg-white p-2 rounded-[2rem] shadow-xl shadow-gray-100 border border-gray-50">
                <button 
                    onClick={() => setSelectedCat("all")}
                    className={`px-8 py-4 rounded-2xl text-[10px] font-black uppercase tracking-widest transition-all ${
                        selectedCat === "all" ? "bg-rose-600 text-white shadow-xl shadow-rose-200" : "bg-transparent text-gray-400 hover:text-gray-600"
                    }`}
                >
                    Semua
                </button>
                {categories.map(cat => (
                    <button 
                        key={cat.id}
                        onClick={() => setSelectedCat(cat.id.toString())}
                        className={`px-8 py-4 rounded-2xl text-[10px] font-black uppercase tracking-widest transition-all ${
                            selectedCat === cat.id.toString() ? "bg-rose-600 text-white shadow-xl shadow-rose-200" : "bg-transparent text-gray-400 hover:text-gray-600"
                        }`}
                    >
                        {cat.nama}
                    </button>
                ))}
            </div>
        </div>

        {/* Product Grid */}
        <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
          {loading ? (
             [...Array(8)].map((_, i) => (
                <div key={i} className="bg-white rounded-[3rem] h-[28rem] animate-pulse border border-gray-100"></div>
             ))
          ) : filteredProducts.map((product) => (
              <div key={product.id} className="bg-white rounded-[3rem] shadow-xl shadow-gray-200/30 border border-gray-100 overflow-hidden hover:shadow-2xl hover:shadow-rose-100/50 transition-all duration-500 group flex flex-col hover:-translate-y-2">
                <div className="aspect-[4/5] bg-rose-50 relative overflow-hidden">
                  <img
                    src={product.gambar || "/assets/img/LandingLogo.png"}
                    alt={product.nama}
                    className="w-full h-full object-cover group-hover:scale-110 transition-transform duration-1000 ease-out"
                  />
                  <div className="absolute top-6 left-6 flex flex-col gap-2">
                     <span className="bg-white/90 backdrop-blur-md px-4 py-2 rounded-2xl text-[10px] font-black uppercase tracking-widest shadow-lg border border-white/20">
                        ⭐ {product.rating || 4.5}
                     </span>
                  </div>
                  <div className="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                </div>
                <div className="p-8 flex-1 flex flex-col">
                  <div className="flex-1">
                    <h3 className="text-base font-black text-gray-900 group-hover:text-rose-600 transition-colors uppercase tracking-tight truncate">{product.nama}</h3>
                    <p className="text-gray-400 text-xs mt-3 line-clamp-2 leading-relaxed font-medium">{product.deskripsi || "Lezat dan bergizi, dimasak dengan bahan pilihan terbaik hari ini."}</p>
                  </div>
                  <div className="mt-8 flex items-center justify-between gap-4">
                    <div>
                        <p className="text-[10px] font-black text-gray-300 uppercase tracking-widest mb-1">Harga</p>
                        <p className="font-black text-lg tracking-tighter text-gray-900">Rp {new Intl.NumberFormat("id-ID").format(product.harga)}</p>
                    </div>
                    <button
                      onClick={() => addToCart({ ...product, quantity: 1 })}
                      className="w-14 h-14 bg-gray-950 text-white rounded-2xl flex items-center justify-center hover:bg-rose-600 transition-all active:scale-90 shadow-2xl shadow-gray-200 group-hover:rotate-6"
                    >
                      <span className="text-2xl font-light">＋</span>
                    </button>
                  </div>
                </div>
              </div>
          ))}
        </div>

        {filteredProducts.length === 0 && !loading && (
          <div className="text-center py-40 bg-white rounded-[4rem] border border-dashed border-gray-200 shadow-sm">
             <div className="text-6xl mb-6">🏜️</div>
             <p className="text-gray-400 font-bold uppercase tracking-widest text-sm">Menu Tidak Ditemukan</p>
             <p className="text-xs text-gray-400 mt-2">Coba kata kunci lain untuk menemukan makananmu.</p>
          </div>
        )}
      </main>

      <Footer />
    </div>
  );
}
