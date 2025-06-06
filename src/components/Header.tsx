
import { useState } from "react";
import { Menu, X, User, Settings } from "lucide-react";
import { Button } from "@/components/ui/button";
import { DropdownMenu, DropdownMenuContent, DropdownMenuItem, DropdownMenuTrigger } from "@/components/ui/dropdown-menu";

const Header = () => {
  const [isMenuOpen, setIsMenuOpen] = useState(false);

  const menuItems = [
    { name: "Accueil", href: "/" },
    { name: "Services", href: "#services" },
    { name: "Actualités", href: "#actualites" },
    { name: "Droit du travail", href: "#droit-travail" },
    { name: "Élections", href: "#elections" },
    { name: "Contact", href: "#contact" },
  ];

  return (
    <header className="bg-white shadow-md sticky top-0 z-50">
      <div className="container mx-auto px-4">
        <div className="flex justify-between items-center py-4">
          {/* Logo */}
          <div className="flex items-center space-x-2">
            <div className="w-10 h-10 bg-blue-600 text-white rounded-lg flex items-center justify-center font-bold">
              FO
            </div>
            <div>
              <h1 className="text-xl font-bold text-gray-900">FOCOM UES ILIAD</h1>
              <p className="text-sm text-gray-600">Force Ouvrière</p>
            </div>
          </div>

          {/* Navigation desktop */}
          <nav className="hidden md:flex space-x-6">
            {menuItems.map((item) => (
              <a
                key={item.name}
                href={item.href}
                className="text-gray-700 hover:text-blue-600 font-medium transition-colors"
              >
                {item.name}
              </a>
            ))}
          </nav>

          {/* User menu and CTA */}
          <div className="hidden md:flex items-center space-x-4">
            <DropdownMenu>
              <DropdownMenuTrigger asChild>
                <Button variant="ghost" size="sm">
                  <User className="h-4 w-4 mr-2" />
                  Mon compte
                </Button>
              </DropdownMenuTrigger>
              <DropdownMenuContent align="end">
                <DropdownMenuItem>
                  <a href="/dashboard" className="flex items-center w-full">
                    <User className="h-4 w-4 mr-2" />
                    Espace membre
                  </a>
                </DropdownMenuItem>
                <DropdownMenuItem>
                  <a href="/admin" className="flex items-center w-full">
                    <Settings className="h-4 w-4 mr-2" />
                    Administration
                  </a>
                </DropdownMenuItem>
              </DropdownMenuContent>
            </DropdownMenu>
            
            <Button className="bg-yellow-500 hover:bg-yellow-600 text-black font-semibold">
              Adhérer
            </Button>
          </div>

          {/* Menu mobile toggle */}
          <button
            className="md:hidden p-2"
            onClick={() => setIsMenuOpen(!isMenuOpen)}
          >
            {isMenuOpen ? <X className="h-6 w-6" /> : <Menu className="h-6 w-6" />}
          </button>
        </div>

        {/* Menu mobile */}
        {isMenuOpen && (
          <div className="md:hidden pb-4">
            <nav className="space-y-2">
              {menuItems.map((item) => (
                <a
                  key={item.name}
                  href={item.href}
                  className="block py-2 text-gray-700 hover:text-blue-600 font-medium transition-colors"
                  onClick={() => setIsMenuOpen(false)}
                >
                  {item.name}
                </a>
              ))}
              <div className="pt-4 space-y-2">
                <a href="/dashboard" className="block py-2 text-gray-700 hover:text-blue-600 font-medium transition-colors">
                  Espace membre
                </a>
                <a href="/admin" className="block py-2 text-gray-700 hover:text-blue-600 font-medium transition-colors">
                  Administration
                </a>
                <Button className="w-full bg-yellow-500 hover:bg-yellow-600 text-black font-semibold mt-2">
                  Adhérer
                </Button>
              </div>
            </nav>
          </div>
        )}
      </div>
    </header>
  );
};

export default Header;
