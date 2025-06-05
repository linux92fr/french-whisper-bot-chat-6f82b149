
import { ArrowRight } from "lucide-react";
import { Button } from "@/components/ui/button";

const HeroSection = () => {
  return (
    <section className="relative bg-gradient-to-br from-blue-900 via-blue-800 to-blue-900 text-white py-20 overflow-hidden">
      {/* Background pattern */}
      <div className="absolute inset-0 opacity-20">
        <div className="absolute inset-0 bg-[radial-gradient(circle_at_1px_1px,rgba(255,255,255,0.15)_1px,transparent_0)] bg-[length:20px_20px]"></div>
      </div>
      
      <div className="container mx-auto px-4 relative z-10">
        <div className="max-w-4xl mx-auto text-center">
          <h1 className="text-5xl md:text-6xl font-bold mb-6 animate-fade-in">
            Ensemble pour défendre
            <span className="block text-yellow-400">nos droits</span>
          </h1>
          
          <p className="text-xl md:text-2xl mb-8 text-blue-100 max-w-3xl mx-auto animate-fade-in">
            Rejoignez le syndicat FOCOM UES ILIAD et participez à la construction d'un environnement professionnel juste et équitable.
          </p>

          {/* Témoignage */}
          <div className="bg-white/10 backdrop-blur-sm rounded-lg p-6 mb-8 max-w-2xl mx-auto animate-fade-in">
            <p className="italic text-lg mb-2">
              "Grâce au syndicat, j'ai pu faire valoir mes droits et obtenir une promotion méritée."
            </p>
            <p className="text-sm text-blue-200">- Marie D., Adhérente depuis 2022</p>
          </div>

          <div className="flex flex-col sm:flex-row gap-4 justify-center animate-fade-in">
            <Button size="lg" className="bg-yellow-500 hover:bg-yellow-600 text-black font-semibold px-8 py-3">
              Adhérer maintenant
              <ArrowRight className="ml-2 h-5 w-5" />
            </Button>
            
            <Button variant="outline" size="lg" className="border-white text-white hover:bg-white hover:text-blue-900 px-8 py-3">
              En savoir plus
            </Button>
          </div>
        </div>
      </div>
    </section>
  );
};

export default HeroSection;
