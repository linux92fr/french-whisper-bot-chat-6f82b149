
import { Mail, Phone, MapPin, Facebook, Twitter, Linkedin } from "lucide-react";

const Footer = () => {
  return (
    <footer className="bg-gray-900 text-white">
      <div className="container mx-auto px-4 py-12">
        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
          {/* À propos */}
          <div>
            <div className="flex items-center space-x-2 mb-4">
              <div className="w-8 h-8 bg-yellow-500 text-black rounded-lg flex items-center justify-center font-bold">
                FO
              </div>
              <h3 className="text-lg font-bold">FOCOM UES ILIAD</h3>
            </div>
            <p className="text-gray-300 text-sm leading-relaxed">
              Le syndicat Force Ouvrière FOCOM UES ILIAD défend les droits et intérêts 
              des salariés au sein du groupe ILIAD depuis plus de 15 ans.
            </p>
          </div>

          {/* Liens rapides */}
          <div>
            <h3 className="text-lg font-semibold mb-4">Liens rapides</h3>
            <ul className="space-y-2">
              <li><a href="#" className="text-gray-300 hover:text-yellow-400 transition-colors">Adhésion</a></li>
              <li><a href="#" className="text-gray-300 hover:text-yellow-400 transition-colors">Nos services</a></li>
              <li><a href="#" className="text-gray-300 hover:text-yellow-400 transition-colors">Actualités</a></li>
              <li><a href="#" className="text-gray-300 hover:text-yellow-400 transition-colors">Documents</a></li>
              <li><a href="#" className="text-gray-300 hover:text-yellow-400 transition-colors">FAQ</a></li>
            </ul>
          </div>

          {/* Contact */}
          <div>
            <h3 className="text-lg font-semibold mb-4">Contact</h3>
            <div className="space-y-3">
              <div className="flex items-center space-x-2 text-gray-300">
                <Mail className="h-4 w-4" />
                <span className="text-sm">contact@focom-iliad.fr</span>
              </div>
              <div className="flex items-center space-x-2 text-gray-300">
                <Phone className="h-4 w-4" />
                <span className="text-sm">01 23 45 67 89</span>
              </div>
              <div className="flex items-center space-x-2 text-gray-300">
                <MapPin className="h-4 w-4" />
                <span className="text-sm">Paris, France</span>
              </div>
            </div>
          </div>

          {/* Réseaux sociaux */}
          <div>
            <h3 className="text-lg font-semibold mb-4">Suivez-nous</h3>
            <div className="flex space-x-3">
              <a href="#" className="bg-blue-600 p-2 rounded-lg hover:bg-blue-700 transition-colors">
                <Facebook className="h-4 w-4" />
              </a>
              <a href="#" className="bg-blue-400 p-2 rounded-lg hover:bg-blue-500 transition-colors">
                <Twitter className="h-4 w-4" />
              </a>
              <a href="#" className="bg-blue-800 p-2 rounded-lg hover:bg-blue-900 transition-colors">
                <Linkedin className="h-4 w-4" />
              </a>
            </div>
            <p className="text-gray-300 text-sm mt-4">
              Restez informé de nos actions et actualités syndicales.
            </p>
          </div>
        </div>

        {/* Copyright */}
        <div className="border-t border-gray-700 mt-8 pt-6 text-center">
          <p className="text-gray-400 text-sm">
            © 2024 FOCOM UES ILIAD - Force Ouvrière. Tous droits réservés.
          </p>
        </div>
      </div>
    </footer>
  );
};

export default Footer;
