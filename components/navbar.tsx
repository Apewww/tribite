"use client";

import { useEffect, useState } from "react";
import Link from "next/link";
import { usePathname, useRouter } from "next/navigation";
import { useCart } from "@/lib/cart-context";
import { supabase } from "@/lib/supabase";

export function Navbar({ showCart = true }) {
  const { totalItems } = useCart();
  const [user, setUser] = useState<any>(null);
  const [isAdmin, setIsAdmin] = useState(false);
  const pathname = usePathname();
  const router = useRouter();

  useEffect(() => {
    async function getSession() {
      const { data: { user } } = await supabase.auth.getUser();
      setUser(user);

      if (user) {
        const { data: profile } = await supabase
          .from("akun")
          .select("role")
          .eq("email", user.email)
          .single();
        
        if (profile?.role === 1) {
          setIsAdmin(true);
        }
      }
    }
    getSession();
  }, []);

  const handleLogout = async () => {
    await supabase.auth.signOut();
    router.push("/");
    router.refresh();
  };

  return (
    <nav className="fixed top-0 w-full z-50 bg-white/70 backdrop-blur-xl border-b border-rose-100/50 transition-all duration-300">
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div className="flex justify-between items-center h-20">
          <Link href="/" className="flex items-center gap-3 group">
            <div className="w-10 h-10 bg-rose-600 rounded-2xl rotate-3 flex items-center justify-center transition-all duration-500 group-hover:rotate-12 group-hover:scale-110 shadow-lg shadow-rose-200">
              <span className="text-white font-black text-xl">T</span>
            </div>
            <span className="text-2xl font-black tracking-tighter bg-clip-text text-transparent bg-gradient-to-r from-gray-900 via-rose-900 to-gray-950">TRIBITE</span>
          </Link>
          
          <div className="flex items-center space-x-2 md:space-x-8">
            <div className="hidden lg:flex items-center space-x-8 mr-4">
              <Link href="/menu" className={`text-sm font-black uppercase tracking-widest transition-all ${pathname === '/menu' ? 'text-rose-600' : 'text-gray-500 hover:text-rose-600'}`}>Menu</Link>
              {isAdmin && (
                <Link href="/admin" className="text-sm font-black uppercase tracking-widest text-rose-500 hover:text-rose-700 transition-all flex items-center gap-2">
                   <span className="w-2 h-2 bg-rose-500 rounded-full animate-pulse"></span>
                   Admin Panel
                </Link>
              )}
            </div>

            <div className="flex items-center gap-2 bg-gray-50/50 backdrop-blur-md p-1.5 rounded-2xl border border-gray-100">
                {showCart && (
                <Link href="/cart" className="relative w-11 h-11 flex items-center justify-center hover:bg-white hover:shadow-sm rounded-xl transition-all">
                    <span className="text-xl">🛒</span>
                    {totalItems > 0 && (
                    <span className="absolute -top-1 -right-1 w-5 h-5 bg-rose-600 text-white text-[10px] font-black flex items-center justify-center rounded-full border-2 border-white shadow-lg animate-in zoom-in">
                        {totalItems}
                    </span>
                    )}
                </Link>
                )}

                {user ? (
                    <div className="flex items-center gap-1">
                         <Link href="/dashboard" className="w-11 h-11 flex items-center justify-center hover:bg-white hover:shadow-sm rounded-xl transition-all">
                             <span className="text-xl">👤</span>
                         </Link>
                         <button 
                            onClick={handleLogout}
                            className="w-11 h-11 flex items-center justify-center text-gray-400 hover:text-rose-600 hover:bg-white hover:shadow-sm rounded-xl transition-all"
                            title="Logout"
                         >
                             <span className="text-xl">🚪</span>
                         </button>
                    </div>
                ) : (
                    <Link href="/login" className="px-6 py-2.5 bg-rose-600 text-white text-xs font-black uppercase tracking-widest rounded-xl hover:bg-rose-700 transition-all active:scale-95 shadow-lg shadow-rose-200">
                        Login
                    </Link>
                )}
            </div>
          </div>
        </div>
      </div>
    </nav>
  );
}
