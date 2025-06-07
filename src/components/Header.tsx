
import { useState } from "react";
import { Button } from "@/components/ui/button";
import { Sheet, SheetContent, SheetDescription, SheetHeader, SheetTitle, SheetTrigger } from "@/components/ui/sheet";
import { Menu, User, LogOut } from "lucide-react";
import { Link, useNavigate } from "react-router-dom";
import { useAuth } from "@/hooks/useAuth";

const Header = () => {
  const [isOpen, setIsOpen] = useState(false);
  const { user, profile, signOut, isAdmin } = useAuth();
  const navigate = useNavigate();

  const handleSignOut = async () => {
    await signOut();
    navigate('/');
  };

  const menuItems = [
    { href: "/#accueil", label: "Accueil" },
    { href: "/#services", label: "Services" },
    { href: "/#actualites", label: "Actualités" },
    { href: "/#droit-travail", label: "Droit du travail" },
    { href: "/#elections", label: "Élections" },
    { href: "/#contact", label: "Contact" },
    { href: "/#adhesion", label: "Adhésion" },
  ];

  return (
    <header className="bg-white shadow-sm border-b sticky top-0 z-50">
      <div className="container mx-auto px-4">
        <div className="flex items-center justify-between h-16">
          <Link to="/" className="flex items-center space-x-2">
            <div className="bg-red-600 text-white p-2 rounded-lg font-bold text-xl">
              FO
            </div>
            <div className="hidden sm:block">
              <h1 className="font-bold text-lg text-gray-900">FOCOM UES ILIAD</h1>
              <p className="text-sm text-gray-600">Force Ouvrière</p>
            </div>
          </Link>

          {/* Navigation desktop */}
          <nav className="hidden lg:flex items-center space-x-8">
            {menuItems.map((item) => (
              <a
                key={item.href}
                href={item.href}
                className="text-gray-700 hover:text-red-600 transition-colors font-medium"
              >
                {item.label}
              </a>
            ))}
          </nav>

          {/* Boutons utilisateur */}
          <div className="flex items-center space-x-4">
            {user ? (
              <div className="flex items-center space-x-2">
                <Button 
                  variant="outline" 
                  onClick={() => navigate('/dashboard')}
                  className="hidden sm:flex"
                >
                  <User className="h-4 w-4 mr-2" />
                  Espace Membre
                </Button>
                {isAdmin && (
                  <Button 
                    variant="outline" 
                    onClick={() => navigate('/admin')}
                    className="hidden sm:flex"
                  >
                    Admin
                  </Button>
                )}
                <Button 
                  variant="ghost" 
                  onClick={handleSignOut}
                  className="hidden sm:flex"
                >
                  <LogOut className="h-4 w-4" />
                </Button>
              </div>
            ) : (
              <Button 
                onClick={() => navigate('/auth')}
                className="hidden sm:flex"
              >
                Connexion
              </Button>
            )}

            {/* Menu mobile */}
            <Sheet open={isOpen} onOpenChange={setIsOpen}>
              <SheetTrigger asChild className="lg:hidden">
                <Button variant="ghost" size="icon">
                  <Menu className="h-6 w-6" />
                </Button>
              </SheetTrigger>
              <SheetContent side="right">
                <SheetHeader>
                  <SheetTitle>Menu</SheetTitle>
                  <SheetDescription>
                    Navigation FOCOM UES ILIAD
                  </SheetDescription>
                </SheetHeader>
                <nav className="flex flex-col space-y-4 mt-8">
                  {menuItems.map((item) => (
                    <a
                      key={item.href}
                      href={item.href}
                      className="text-gray-700 hover:text-red-600 transition-colors font-medium py-2"
                      onClick={() => setIsOpen(false)}
                    >
                      {item.label}
                    </a>
                  ))}
                  
                  {user ? (
                    <>
                      <Button 
                        variant="outline" 
                        onClick={() => {
                          navigate('/dashboard');
                          setIsOpen(false);
                        }}
                        className="justify-start"
                      >
                        <User className="h-4 w-4 mr-2" />
                        Espace Membre
                      </Button>
                      {isAdmin && (
                        <Button 
                          variant="outline" 
                          onClick={() => {
                            navigate('/admin');
                            setIsOpen(false);
                          }}
                          className="justify-start"
                        >
                          Admin
                        </Button>
                      )}
                      <Button 
                        variant="ghost" 
                        onClick={() => {
                          handleSignOut();
                          setIsOpen(false);
                        }}
                        className="justify-start"
                      >
                        <LogOut className="h-4 w-4 mr-2" />
                        Déconnexion
                      </Button>
                    </>
                  ) : (
                    <Button 
                      onClick={() => {
                        navigate('/auth');
                        setIsOpen(false);
                      }}
                      className="justify-start"
                    >
                      Connexion
                    </Button>
                  )}
                </nav>
              </SheetContent>
            </Sheet>
          </div>
        </div>
      </div>
    </header>
  );
};

export default Header;
