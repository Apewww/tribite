"use client";

import Link from "next/link";
import { usePathname } from "next/navigation";

const navItems = [
  { href: "/admin", label: "Dashboard", icon: "📊" },
  { href: "/admin/katalog", label: "Katalog Menu", icon: "🍔" },
  { href: "/admin/akun", label: "Manajemen Akun", icon: "👥" },
  { href: "/admin/kupon", label: "Kupon Diskon", icon: "🎟️" },
];

export function AdminSidebar() {
  const pathname = usePathname();

  return (
    <aside className="w-64 bg-gray-950 border-r border-gray-800 p-6 flex flex-col fixed h-full shadow-2xl">
      <div className="flex items-center gap-2 mb-10 group">
        <div className="w-8 h-8 bg-rose-600 rounded-lg rotate-3 flex items-center justify-center font-bold transition-transform group-hover:rotate-12">T</div>
        <span className="font-bold tracking-widest text-sm uppercase">Tribite Admin</span>
      </div>
      
      <nav className="flex-1 space-y-2">
        {navItems.map((item) => (
          <Link 
            key={item.href}
            href={item.href} 
            className={`flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-bold border transition-all group ${
              pathname === item.href 
                ? "bg-rose-600 border-rose-600 text-white shadow-lg shadow-rose-900/20" 
                : "border-transparent hover:bg-gray-900 hover:border-gray-800 text-gray-400 hover:text-white"
            }`}
          >
            <span className="group-hover:scale-110 transition-transform">{item.icon}</span> 
            {item.label}
          </Link>
        ))}
      </nav>

      <div className="mt-auto space-y-4 pt-6 border-t border-gray-800">
         <Link href="/" className="block px-4 py-2 text-xs font-bold text-gray-500 hover:text-white transition-colors uppercase tracking-widest">
            ← Ke Website
         </Link>
         <div className="px-4 py-3 bg-gray-900/50 rounded-2xl border border-gray-800/50">
            <p className="text-[10px] uppercase font-black tracking-widest text-gray-600 mb-1">Status</p>
            <div className="flex items-center gap-2">
               <div className="w-2 h-2 bg-green-500 rounded-full"></div>
               <span className="text-[10px] font-bold text-green-500">Online</span>
            </div>
         </div>
      </div>
    </aside>
  );
}
