
import { Users, Trophy, Clock, TrendingUp } from "lucide-react";

const StatsSection = () => {
  const stats = [
    {
      icon: Users,
      number: "2,340",
      label: "Adhérents actifs",
      description: "Membres engagés"
    },
    {
      icon: Trophy,
      number: "47",
      label: "Victoires obtenues",
      description: "En 2024"
    },
    {
      icon: Clock,
      number: "15",
      label: "Années d'expérience",
      description: "Au service des salariés"
    },
    {
      icon: TrendingUp,
      number: "12%",
      label: "Augmentation moyenne",
      description: "Négociée cette année"
    }
  ];

  return (
    <section className="py-16 bg-gray-50">
      <div className="container mx-auto px-4">
        <div className="grid grid-cols-2 md:grid-cols-4 gap-8">
          {stats.map((stat, index) => (
            <div key={index} className="text-center group">
              <div className="bg-blue-600 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform duration-300">
                <stat.icon className="h-8 w-8 text-white" />
              </div>
              <div className="text-3xl font-bold text-gray-900 mb-1">{stat.number}</div>
              <div className="text-lg font-semibold text-gray-700 mb-1">{stat.label}</div>
              <div className="text-sm text-gray-500">{stat.description}</div>
            </div>
          ))}
        </div>
      </div>
    </section>
  );
};

export default StatsSection;
