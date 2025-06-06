
import { useState } from "react";
import { User, FileText, Calendar, CreditCard, Bell, Download } from "lucide-react";
import { Button } from "@/components/ui/button";
import { Card, CardContent, CardDescription, CardHeader, CardTitle } from "@/components/ui/card";
import { Tabs, TabsContent, TabsList, TabsTrigger } from "@/components/ui/tabs";
import { Badge } from "@/components/ui/badge";
import Header from "@/components/Header";
import Footer from "@/components/Footer";

const UserDashboard = () => {
  const [activeTab, setActiveTab] = useState("profile");

  const userInfo = {
    name: "Marie Dupont",
    email: "marie.dupont@example.com",
    memberNumber: "FO-2023-001234",
    joinDate: "15 janvier 2023",
    status: "Membre actif",
    subscription: "Cotisation à jour"
  };

  const recentActivities = [
    { id: 1, type: "document", title: "Téléchargement du guide des droits", date: "Il y a 2 jours" },
    { id: 2, type: "event", title: "Inscription à l'assemblée générale", date: "Il y a 5 jours" },
    { id: 3, type: "payment", title: "Paiement cotisation Q1 2024", date: "Il y a 1 semaine" },
  ];

  const availableDocuments = [
    { id: 1, title: "Guide des droits du salarié", type: "PDF", size: "2.3 MB" },
    { id: 2, title: "Convention collective", type: "PDF", size: "1.8 MB" },
    { id: 3, title: "Formulaire de réclamation", type: "PDF", size: "456 KB" },
    { id: 4, title: "Bulletin d'adhésion", type: "PDF", size: "234 KB" },
  ];

  return (
    <div className="min-h-screen bg-background">
      <Header />
      
      <div className="container mx-auto px-4 py-8">
        <div className="mb-8">
          <h1 className="text-3xl font-bold text-gray-900 mb-2">Mon Espace Membre</h1>
          <p className="text-gray-600">Bienvenue dans votre espace personnel</p>
        </div>

        <Tabs value={activeTab} onValueChange={setActiveTab} className="space-y-6">
          <TabsList className="grid w-full grid-cols-5">
            <TabsTrigger value="profile" className="flex items-center gap-2">
              <User className="h-4 w-4" />
              Profil
            </TabsTrigger>
            <TabsTrigger value="documents" className="flex items-center gap-2">
              <FileText className="h-4 w-4" />
              Documents
            </TabsTrigger>
            <TabsTrigger value="events" className="flex items-center gap-2">
              <Calendar className="h-4 w-4" />
              Événements
            </TabsTrigger>
            <TabsTrigger value="payments" className="flex items-center gap-2">
              <CreditCard className="h-4 w-4" />
              Cotisations
            </TabsTrigger>
            <TabsTrigger value="notifications" className="flex items-center gap-2">
              <Bell className="h-4 w-4" />
              Notifications
            </TabsTrigger>
          </TabsList>

          <TabsContent value="profile" className="space-y-6">
            <div className="grid grid-cols-1 lg:grid-cols-2 gap-6">
              <Card>
                <CardHeader>
                  <CardTitle>Informations Personnelles</CardTitle>
                  <CardDescription>Vos informations de membre</CardDescription>
                </CardHeader>
                <CardContent className="space-y-4">
                  <div className="grid grid-cols-2 gap-4">
                    <div>
                      <label className="text-sm font-medium text-gray-500">Nom complet</label>
                      <p className="text-gray-900">{userInfo.name}</p>
                    </div>
                    <div>
                      <label className="text-sm font-medium text-gray-500">Email</label>
                      <p className="text-gray-900">{userInfo.email}</p>
                    </div>
                    <div>
                      <label className="text-sm font-medium text-gray-500">Numéro de membre</label>
                      <p className="text-gray-900">{userInfo.memberNumber}</p>
                    </div>
                    <div>
                      <label className="text-sm font-medium text-gray-500">Date d'adhésion</label>
                      <p className="text-gray-900">{userInfo.joinDate}</p>
                    </div>
                  </div>
                  <div className="flex gap-2 pt-4">
                    <Badge variant="secondary" className="bg-green-100 text-green-800">
                      {userInfo.status}
                    </Badge>
                    <Badge variant="secondary" className="bg-blue-100 text-blue-800">
                      {userInfo.subscription}
                    </Badge>
                  </div>
                  <Button className="mt-4">Modifier mes informations</Button>
                </CardContent>
              </Card>

              <Card>
                <CardHeader>
                  <CardTitle>Activité Récente</CardTitle>
                  <CardDescription>Vos dernières actions</CardDescription>
                </CardHeader>
                <CardContent>
                  <div className="space-y-4">
                    {recentActivities.map((activity) => (
                      <div key={activity.id} className="flex items-start gap-3 p-3 bg-gray-50 rounded-lg">
                        <div className="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center">
                          {activity.type === "document" && <FileText className="h-4 w-4 text-blue-600" />}
                          {activity.type === "event" && <Calendar className="h-4 w-4 text-blue-600" />}
                          {activity.type === "payment" && <CreditCard className="h-4 w-4 text-blue-600" />}
                        </div>
                        <div className="flex-1">
                          <p className="font-medium text-gray-900">{activity.title}</p>
                          <p className="text-sm text-gray-500">{activity.date}</p>
                        </div>
                      </div>
                    ))}
                  </div>
                </CardContent>
              </Card>
            </div>
          </TabsContent>

          <TabsContent value="documents" className="space-y-6">
            <Card>
              <CardHeader>
                <CardTitle>Documents Disponibles</CardTitle>
                <CardDescription>Téléchargez vos documents syndicaux</CardDescription>
              </CardHeader>
              <CardContent>
                <div className="grid grid-cols-1 md:grid-cols-2 gap-4">
                  {availableDocuments.map((doc) => (
                    <div key={doc.id} className="flex items-center justify-between p-4 border rounded-lg">
                      <div className="flex items-center gap-3">
                        <FileText className="h-8 w-8 text-red-600" />
                        <div>
                          <p className="font-medium text-gray-900">{doc.title}</p>
                          <p className="text-sm text-gray-500">{doc.type} • {doc.size}</p>
                        </div>
                      </div>
                      <Button variant="outline" size="sm">
                        <Download className="h-4 w-4 mr-2" />
                        Télécharger
                      </Button>
                    </div>
                  ))}
                </div>
              </CardContent>
            </Card>
          </TabsContent>

          <TabsContent value="events" className="space-y-6">
            <Card>
              <CardHeader>
                <CardTitle>Événements à Venir</CardTitle>
                <CardDescription>Participez aux événements du syndicat</CardDescription>
              </CardHeader>
              <CardContent>
                <div className="text-center py-8">
                  <Calendar className="h-12 w-12 text-gray-400 mx-auto mb-4" />
                  <p className="text-gray-500">Aucun événement programmé pour le moment</p>
                </div>
              </CardContent>
            </Card>
          </TabsContent>

          <TabsContent value="payments" className="space-y-6">
            <Card>
              <CardHeader>
                <CardTitle>Historique des Cotisations</CardTitle>
                <CardDescription>Suivez vos paiements et cotisations</CardDescription>
              </CardHeader>
              <CardContent>
                <div className="text-center py-8">
                  <CreditCard className="h-12 w-12 text-gray-400 mx-auto mb-4" />
                  <p className="text-gray-500">Historique des paiements à venir</p>
                </div>
              </CardContent>
            </Card>
          </TabsContent>

          <TabsContent value="notifications" className="space-y-6">
            <Card>
              <CardHeader>
                <CardTitle>Paramètres de Notification</CardTitle>
                <CardDescription>Gérez vos préférences de notification</CardDescription>
              </CardHeader>
              <CardContent>
                <div className="text-center py-8">
                  <Bell className="h-12 w-12 text-gray-400 mx-auto mb-4" />
                  <p className="text-gray-500">Paramètres de notification à configurer</p>
                </div>
              </CardContent>
            </Card>
          </TabsContent>
        </Tabs>
      </div>
      
      <Footer />
    </div>
  );
};

export default UserDashboard;
