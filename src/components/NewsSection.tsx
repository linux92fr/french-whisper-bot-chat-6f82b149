
import { ArrowRight, Calendar, Tag } from "lucide-react";
import { Card, CardContent, CardDescription, CardHeader, CardTitle } from "@/components/ui/card";
import { Badge } from "@/components/ui/badge";
import { AspectRatio } from "@/components/ui/aspect-ratio";

const NewsSection = () => {
  const news = [
    {
      id: 1,
      image: "https://images.unsplash.com/photo-1582213782179-e0d53f98f2ca?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80",
      date: "Il y a 3 jours",
      title: "Négociation collective : avancées importantes",
      excerpt: "Après plusieurs semaines de négociation, nous avons obtenu des avancées significatives sur les conditions de travail...",
      tags: ["Négociation", "Salaires"],
      isUrgent: true
    },
    {
      id: 2,
      image: "https://images.unsplash.com/photo-1551836022-d5d88e9218df?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80",
      date: "À définir",
      title: "Formations FO",
      excerpt: "Nos prochaines sessions de formation pour les adhérents auront lieu en 2025. Inscrivez-vous dès maintenant...",
      tags: ["Formation", "Événement"],
      isUrgent: false
    },
    {
      id: 3,
      image: "https://images.unsplash.com/photo-1542744173-8e7e53415bb0?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80",
      date: "À définir",
      title: "Assemblée générale annuelle",
      excerpt: "L'assemblée générale annuelle du syndicat se tiendra en 2025. Venez participer à la vie démocratique...",
      tags: ["Assemblée", "Démocratie"],
      isUrgent: false
    }
  ];

  return (
    <section className="py-20 bg-gray-50">
      <div className="container mx-auto px-4">
        <div className="text-center mb-16">
          <h2 className="text-4xl font-bold text-gray-900 mb-4">Actualités Récentes</h2>
          <p className="text-xl text-gray-600">
            Suivez l'actualité de votre syndicat et les dernières victoires
          </p>
        </div>
        
        <div className="grid md:grid-cols-3 gap-8 max-w-6xl mx-auto">
          {news.map((article) => (
            <Card key={article.id} className="group hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 bg-white">
              <CardHeader className="p-0">
                <AspectRatio ratio={16 / 9}>
                  <img 
                    src={article.image} 
                    alt={article.title}
                    className="w-full h-full object-cover rounded-t-lg group-hover:scale-105 transition-transform duration-300"
                    loading="lazy"
                  />
                </AspectRatio>
                {article.isUrgent && (
                  <Badge className="absolute top-4 left-4 bg-red-500 hover:bg-red-600">
                    Urgent
                  </Badge>
                )}
              </CardHeader>
              <CardContent className="p-6">
                <div className="flex items-center gap-2 text-sm text-gray-500 mb-3">
                  <Calendar className="h-4 w-4" />
                  {article.date}
                </div>
                
                <CardTitle className="text-xl mb-3 group-hover:text-blue-600 transition-colors">
                  {article.title}
                </CardTitle>
                
                <CardDescription className="text-gray-600 mb-4 line-clamp-3">
                  {article.excerpt}
                </CardDescription>
                
                <div className="flex flex-wrap gap-2 mb-4">
                  {article.tags.map((tag, index) => (
                    <Badge key={index} variant="outline" className="text-xs">
                      <Tag className="h-3 w-3 mr-1" />
                      {tag}
                    </Badge>
                  ))}
                </div>
                
                <button className="inline-flex items-center text-blue-600 hover:text-blue-800 font-semibold group-hover:translate-x-1 transition-transform duration-300">
                  Lire la suite
                  <ArrowRight className="ml-2 h-4 w-4" />
                </button>
              </CardContent>
            </Card>
          ))}
        </div>
        
        <div className="text-center mt-12">
          <button className="inline-flex items-center bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg font-semibold transition-colors">
            Voir toutes les actualités
            <ArrowRight className="ml-2 h-5 w-5" />
          </button>
        </div>
      </div>
    </section>
  );
};

export default NewsSection;
