"use client";

import Link from "next/link";
import { Navbar } from "@/components/navbar";
import { Footer } from "@/components/footer";

export default function Home() {
  return (
    <div className="min-h-screen bg-white selection:bg-rose-100 selection:text-rose-900 overflow-x-hidden">
      <Navbar />

      <main>
        {/* Modern Hero Section */}
        <section className="relative pt-32 pb-20 md:pt-48 md:pb-32 overflow-hidden">
            {/* Background Decorations */}
            <div className="absolute top-0 right-0 w-[500px] h-[500px] bg-rose-50 rounded-full blur-[100px] -z-10 translate-x-1/2 -translate-y-1/2 opacity-70"></div>
            <div className="absolute bottom-0 left-0 w-[300px] h-[300px] bg-orange-50 rounded-full blur-[80px] -z-10 -translate-x-1/2 translate-y-1/2 opacity-50"></div>

            <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div className="flex flex-col lg:flex-row items-center gap-16">
                    <div className="flex-1 text-center lg:text-left space-y-8 max-w-2xl mx-auto lg:mx-0">
                        <div className="inline-flex items-center gap-2 px-4 py-2 bg-rose-50 rounded-full border border-rose-100 animate-in fade-in slide-in-from-bottom-4 duration-700">
                             <span className="w-2 h-2 bg-rose-500 rounded-full animate-pulse"></span>
                             <span className="text-[10px] font-black uppercase tracking-widest text-rose-600">Terbaik di Kota Anda</span>
                        </div>
                        
                        <h1 className="text-5xl md:text-7xl font-black text-gray-950 leading-[1.1] tracking-tighter animate-in fade-in slide-in-from-bottom-8 duration-1000">
                            Nikmati Kelezatan <span className="text-gradient font-black">Tanpa Menunggu.</span>
                        </h1>
                        
                        <p className="text-lg text-gray-500 font-medium leading-relaxed max-w-xl mx-auto lg:mx-0 animate-in fade-in slide-in-from-bottom-10 duration-1000 delay-200">
                            Tribite menghadirkan sistem POS paling modern untuk pengalaman memesan makanan yang lebih cepat, mudah, dan tentu saja, lebih nikmat.
                        </p>

                        <div className="flex flex-col sm:flex-row items-center gap-4 pt-4 animate-in fade-in slide-in-from-bottom-12 duration-1000 delay-300">
                            <Link href="/menu" className="w-full sm:w-auto px-10 py-5 bg-rose-600 text-white rounded-2xl font-black shadow-2xl shadow-rose-200 hover:bg-rose-700 transition-all hover:-translate-y-1 active:scale-95 text-sm uppercase tracking-widest">
                                Pesan Sekarang ➔
                            </Link>
                            <Link href="#features" className="w-full sm:w-auto px-10 py-5 bg-white text-gray-900 border border-gray-100 rounded-2xl font-black hover:bg-gray-50 transition-all active:scale-95 text-sm uppercase tracking-widest">
                                Kenali Kami
                            </Link>
                        </div>
                    </div>

                    <div className="flex-1 relative animate-in fade-in zoom-in duration-1000 delay-500">
                        <div className="relative z-10 w-full aspect-square max-w-[500px] mx-auto group">
                            <div className="absolute inset-0 bg-rose-600 rounded-[3rem] rotate-6 group-hover:rotate-3 transition-transform duration-700"></div>
                            <img 
                                src="/assets/img/LandingLogo.png" 
                                alt="Tribite Food" 
                                className="relative z-10 w-full h-full object-cover rounded-[3rem] -rotate-3 group-hover:rotate-0 transition-transform duration-700 shadow-2xl"
                            />
                            {/* Floating Badges */}
                            <div className="absolute -top-6 -right-6 bg-white p-6 rounded-3xl shadow-xl border border-rose-50 animate-bounce delay-700 duration-[3000ms]">
                               <span className="text-3xl">🔥</span>
                            </div>
                            <div className="absolute -bottom-10 -left-10 bg-white/90 backdrop-blur-md p-6 rounded-[2rem] shadow-xl border border-white/20 hidden md:block animate-in slide-in-from-left-20 duration-1000 delay-1000">
                               <p className="text-[10px] font-black uppercase text-gray-400 mb-1">Pilihan Utama</p>
                               <p className="font-black text-rose-600">10k+ Pelanggan</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {/* Feature Grid */}
        <section id="features" className="py-32 bg-[#fafafa]">
            <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div className="text-center mb-20 space-y-4">
                    <h2 className="text-xs font-black uppercase tracking-[0.3em] text-rose-600">Kenapa Tribite?</h2>
                    <p className="text-4xl md:text-5xl font-black text-gray-900 tracking-tight">Lebih dari sekadar aplikasi.</p>
                </div>

                <div className="grid grid-cols-1 md:grid-cols-3 gap-8">
                    {[
                        { title: "SANGAT CEPAT", desc: "Sistem cloud yang dioptimalkan untuk memproses pesanan dalam hitungan detik.", icon: "⚡" },
                        { title: "POINT REWARDS", desc: "Kumpulkan poin setiap pembelian dan tukarkan dengan hidangan favorit Anda.", icon: "💎" },
                        { title: "USER FRIENDLY", desc: "Antarmuka yang intuitif dan mudah dipahami oleh siapa saja, di mana saja.", icon: "📱" }
                    ].map((feature, i) => (
                        <div key={i} className="bg-white p-10 rounded-[3rem] shadow-xl shadow-gray-200/40 border border-gray-50 group hover:-translate-y-2 transition-all duration-500">
                            <div className="w-16 h-16 bg-rose-50 rounded-2xl flex items-center justify-center text-3xl mb-8 group-hover:scale-110 group-hover:bg-rose-600 transition-all duration-500 group-hover:text-white">
                                {feature.icon}
                            </div>
                            <h3 className="text-lg font-black text-gray-900 mb-4 tracking-tighter">{feature.title}</h3>
                            <p className="text-gray-500 font-medium leading-relaxed">{feature.desc}</p>
                        </div>
                    ))}
                </div>
            </div>
        </section>

        {/* CTA Section */}
        <section className="py-20">
             <div className="max-w-7xl mx-auto px-4">
                <div className="bg-rose-600 rounded-[3.5rem] p-12 md:p-24 text-center text-white relative overflow-hidden shadow-2xl shadow-rose-200">
                    <div className="absolute top-0 right-0 w-64 h-64 bg-white/10 rounded-full -translate-y-1/2 translate-x-1/2"></div>
                    <div className="absolute bottom-0 left-0 w-48 h-48 bg-white/5 rounded-full translate-y-1/2 -translate-x-1/2"></div>
                    
                    <h2 className="text-4xl md:text-6xl font-black mb-8 leading-tight tracking-tight relative z-10">Lapar? Hubungi <br className="hidden md:block" /> Kami Sekarang.</h2>
                    <Link href="/menu" className="inline-block px-12 py-6 bg-white text-rose-600 rounded-2xl font-black shadow-xl hover:bg-gray-100 transition-all hover:scale-105 active:scale-95 uppercase tracking-widest text-sm relative z-10">
                        Buka Katalog Menu
                    </Link>
                </div>
             </div>
        </section>
      </main>

      <Footer />
    </div>
  );
}
