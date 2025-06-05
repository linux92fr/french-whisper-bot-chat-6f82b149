
import { ArrowRight } from "lucide-react";
import { Card, CardContent, CardDescription, CardHeader, CardTitle } from "@/components/ui/card";
import { Badge } from "@/components/ui/badge";

const ServicesSection = () => {
  const services = [
    {
      icon: "📰",
      title: "Actualités du travail",
      description: "Restez informé des dernières évolutions législatives et jurisprudentielles dans le domaine du droit du travail.",
      badge: "Mis à jour",
      link: "/actualites",
      color: "bg-green-50 border-green-200"
    },
    {
      icon: "🛡️",
      title: "Défense des droits",
      description: "Notre équipe d'experts vous accompagne dans la défense de vos droits et la résolution des conflits au travail.",
      badge: "Populaire",
      link: "/droit-travail",
      color: "bg-blue-50 border-blue-200"
    },
    {
      icon: "📊",
      title: "Résultats des élections",
      description: "Consultez les résultats des dernières élections professionnelles et l'impact de notre action syndicale.",
      badge: "Nouveau",
      link: "/elections",
      color: "bg-purple-50 border-purple-200"
    }
  ];

  return (
    <section className="py-20 bg-white">
      <div className="container mx-auto px-4">
        <div className="text-center mb-16">
          <h2 className="text-4xl font-bold text-gray-900 mb-4">Nos Services</h2>
          <p className="text-xl text-gray-600 max-w-2xl mx-auto">
            Des services complets pour accompagner et protéger tous nos adhérents
          </p>
        </div>
        
        <div className="grid md:grid-cols-3 gap-8 max-w-6xl mx-auto">
          {services.map((service, index) => (
            <Card key={index} className={`group hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 ${service.color}`}>
              <CardHeader className="text-center pb-4">
                <div className="text-4xl mb-4">{service.icon}</div>
                <div className="flex justify-center mb-2">
                  <Badge variant="secondary" className="text-xs">
                    {service.badge}
                  </Badge>
                </div>
                <CardTitle className="text-xl mb-2">{service.title}</CardTitle>
              </CardHeader>
              <CardContent>
                <CardDescription className="text-gray-600 mb-6 text-center">
                  {service.description}
                </CardDescription>
                <div className="text-center">
                  <button className="inline-flex items-center text-blue-600 hover:text-blue-800 font-semibold group-hover:translate-x-1 transition-transform duration-300">
                    En savoir plus
                    <ArrowRight className="ml-2 h-4 w-4" />
                  </button>
                </div>
              </CardContent>
            </Card>
          ))}
        </div>
      </div>
    </section>
  );
};

export default ServicesSection;
