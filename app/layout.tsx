import type { Metadata } from "next";
import "./globals.css";
import { CartProvider } from "@/lib/cart-context";

export const metadata: Metadata = {
  title: "Tribite - Point of Sale",
  description: "Aplikasi pemesan makanan melalui aplikasi cloud yang siap melayani dimana saja dan kapan saja",
};

export default function RootLayout({
  children,
}: Readonly<{
  children: React.ReactNode;
}>) {
  return (
    <html lang="en">
      <body className="antialiased">
        <CartProvider>
          {children}
        </CartProvider>
      </body>
    </html>
  );
}
