import { Navbar } from "@/components/navbar";
import { Footer } from "@/components/footer";
import Link from "next/link";

export default function Home() {
  return (
    <div className="min-h-screen bg-white text-gray-900 selection:bg-rose-100 selection:text-rose-900">
      <Navbar />

      {/* Hero Section */}
      <main className="pt-32 pb-16 px-4 sm:px-6 lg:px-8">
        <div className="max-w-7xl mx-auto">
          <div className="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div className="space-y-8 animate-in fade-in slide-in-from-left duration-1000">
              <div className="space-y-2">
                <span className="text-rose-600 font-semibold tracking-wide uppercase text-sm">
                  Halo Selamat datang di ..
                </span>
                <h1 className="text-5xl sm:text-7xl font-extrabold tracking-tight text-gray-900">
                  TRIBITE
                </h1>
              </div>
              
              <p className="text-lg sm:text-xl text-gray-600 leading-relaxed max-w-xl">
                Aplikasi pemesan makanan melalui aplikasi cloud yang siap melayani dimana saja dan kapan saja. Nikmati pengalaman memesan makanan yang lebih cepat, mudah, dan menyenangkan.
              </p>

              <div className="flex flex-col sm:flex-row gap-4">
                <Link 
                  href="/menu" 
                  className="px-8 py-4 text-center font-semibold text-white bg-rose-600 hover:bg-rose-700 rounded-2xl shadow-xl shadow-rose-200 transition-all hover:-translate-y-1 active:scale-95 group"
                >
                  Pesan Sekarang
                  <span className="inline-block ml-2 transition-transform group-hover:translate-x-1">→</span>
                </Link>
                <Link 
                  href="/about" 
                  className="px-8 py-4 text-center font-semibold text-gray-700 bg-white hover:bg-gray-50 rounded-2xl border border-gray-200 transition-all active:scale-95"
                >
                  Pelajari Lebih Lanjut
                </Link>
              </div>

              {/* Stats/Badges */}
              <div className="flex items-center gap-8 pt-8">
                <div>
                  <p className="text-2xl font-bold text-gray-900">2k+</p>
                  <p className="text-sm text-gray-500">Menu Pilihan</p>
                </div>
                <div className="w-px h-10 bg-gray-200"></div>
                <div>
                  <p className="text-2xl font-bold text-gray-900">10k+</p>
                  <p className="text-sm text-gray-500">Pelanggan Puas</p>
                </div>
                <div className="w-px h-10 bg-gray-200"></div>
                <div>
                  <p className="text-2xl font-bold text-gray-900">24/7</p>
                  <p className="text-sm text-gray-500">Layanan Cloud</p>
                </div>
              </div>
            </div>

            <div className="relative animate-in zoom-in duration-1000">
              <div className="absolute -inset-1 bg-gradient-to-tr from-rose-500 to-orange-400 rounded-3xl blur opacity-25 group-hover:opacity-100 transition duration-1000 group-hover:duration-200"></div>
              <div className="relative bg-white rounded-3xl overflow-hidden shadow-2xl">
                {/* Image Placeholder logic - will use generate_image if needed, but for now I'll use a placeholder URL or descriptive alt */}
                <div className="aspect-square bg-rose-50 flex items-center justify-center p-12">
                   <img 
                    src="/assets/img/LandingLogo.png" 
                    alt="Tribite Premium Experience"
                    className="w-full h-full object-contain drop-shadow-2xl"
                   />
                </div>
              </div>
              
              {/* Decorative elements */}
              <div className="absolute -bottom-6 -left-6 bg-white p-4 rounded-2xl shadow-xl border border-rose-100 animate-bounce">
                <div className="flex items-center gap-3">
                  <div className="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center text-green-600">
                    ✓
                  </div>
                  <div>
                    <p className="text-xs text-gray-500">Terkonfirmasi</p>
                    <p className="text-sm font-bold text-gray-900">Pesanan Diproses</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </main>

      <Footer />
    </div>
  );
}
