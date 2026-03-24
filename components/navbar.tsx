"use client";

import Link from "next/link";
import { useCart } from "@/lib/cart-context";

export function Navbar({ showCart = true }) {
  const { totalItems } = useCart();

  return (
    <nav className="fixed top-0 w-full z-50 bg-white/80 backdrop-blur-md border-b border-gray-100">
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div className="flex justify-between items-center h-16">
          <Link href="/" className="flex items-center gap-2 group">
            <div className="w-8 h-8 bg-rose-600 rounded-lg rotate-3 flex items-center justify-center transition-transform group-hover:rotate-12">
              <span className="text-white font-bold text-lg">T</span>
            </div>
            <span className="text-xl font-bold tracking-tight">TRIBITE</span>
          </Link>
          
          <div className="flex items-center space-x-6">
            <div className="hidden md:flex items-center space-x-8 mr-4">
              <Link href="/menu" className="text-sm font-medium hover:text-rose-600 transition-colors">Menu</Link>
              <Link href="/about" className="text-sm font-medium hover:text-rose-600 transition-colors">Tentang</Link>
            </div>

            {showCart && (
              <Link href="/cart" className="relative p-2 hover:bg-gray-50 rounded-full transition-colors">
                <span className="text-xl">🛒</span>
                {totalItems > 0 && (
                  <span className="absolute top-0 right-0 w-4 h-4 bg-rose-600 text-white text-[10px] flex items-center justify-center rounded-full border-2 border-white">
                    {totalItems}
                  </span>
                )}
              </Link>
            )}

            <Link href="/dashboard" className="p-2 hover:bg-gray-50 rounded-full transition-colors">
               <span className="text-xl">👤</span>
            </Link>
          </div>
        </div>
      </div>
    </nav>
  );
}
