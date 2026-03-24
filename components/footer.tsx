import Link from "next/link";

export function Footer() {
  return (
    <footer className="mt-20 border-t border-gray-100 bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
      <div className="max-w-7xl mx-auto flex flex-col md:flex-row justify-between items-center gap-8">
        <div className="flex items-center gap-2">
          <div className="w-6 h-6 bg-gray-900 rounded-lg flex items-center justify-center text-[10px] text-white font-bold">T</div>
          <span className="text-base font-bold text-gray-900 tracking-tight">TRIBITE</span>
        </div>
        <div className="flex gap-8 text-sm text-gray-500 font-medium">
          <Link href="#" className="hover:text-rose-600 transition-colors">Privasi</Link>
          <Link href="#" className="hover:text-rose-600 transition-colors">Syarat</Link>
          <Link href="#" className="hover:text-rose-600 transition-colors">Bantuan</Link>
        </div>
        <p className="text-xs text-gray-400 font-medium">© 2026 Tribite POS. Dibuat dengan cinta untuk kuliner Indonesia.</p>
      </div>
    </footer>
  );
}
