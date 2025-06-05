
import { ArrowRight } from "lucide-react";
import { Button } from "@/components/ui/button";
import { Card, CardContent, CardDescription, CardHeader, CardTitle } from "@/components/ui/card";
import { Badge } from "@/components/ui/badge";
import HeroSection from "@/components/HeroSection";
import ServicesSection from "@/components/ServicesSection";
import NewsSection from "@/components/NewsSection";
import StatsSection from "@/components/StatsSection";

const Index = () => {
  return (
    <div className="min-h-screen bg-background">
      {/* Bandeau d'urgence */}
      <div className="bg-red-600 text-white py-2 px-4 text-center text-sm">
        <span className="font-semibold">🚨 Alerte :</span> Négociations salariales en cours - Restez informés
      </div>

      <HeroSection />
      <StatsSection />
      <ServicesSection />
      <NewsSection />
    </div>
  );
};

export default Index;
