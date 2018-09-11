using ISMT.Api;
using ISMT.Model;
using Newtonsoft.Json;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

using Xamarin.Forms;
using Xamarin.Forms.Xaml;

namespace ISMT
{
	[XamlCompilation(XamlCompilationOptions.Compile)]
	public partial class Aviso : ContentPage
	{

        private WebService servidor; //ligação ao servidor
       

        public Aviso ()
		{

           
			InitializeComponent ();
            NavigationPage.SetHasNavigationBar(this, false);

            Device.BeginInvokeOnMainThread(() =>
            {
            try
            {
                    
                    
                //Usa o api webservice.cs && model avisos para constuir a lista
                servidor = new WebService();
                List<Avisos> ListaAvisos = JsonConvert.DeserializeObject<List<Avisos>>(servidor.PedidoServidor("http://ismtapp.ismtprogramacao.x10host.com/api/avisosapi").ReadLine());

                foreach (Avisos aviso in ListaAvisos)
                {
                        if (aviso.tipo == "0")
                    {
                        //Cria uma nova label e adiciona ao stacklayout com o nome de stackGerais
                        Label text = new Label{ Text= aviso.aviso, TextColor = Color.White, Margin = new Thickness(10,0,0,0), FontSize = 12, FontFamily = Device.RuntimePlatform == Device.iOS ? "Raleway-Light" : Device.RuntimePlatform == Device.Android ? "Raleway-Light.ttf#Raleway-Light" : null };
                        

                            var tapGestureRecognizer = new TapGestureRecognizer();
                            tapGestureRecognizer.Tapped += (sender, e) =>
                            {

                                var avisoId = new Avisos
                                {
                                    aviso = aviso.aviso,
                                    texto = aviso.texto,
                                   

                                };

                                var newPage = new AvisosId();
                                newPage.BindingContext = avisoId;
                                App.Current.MainPage = new Menu { Detail = new NavigationPage(newPage) };

                            };

                            text.GestureRecognizers.Add(tapGestureRecognizer);

                            stackGerais.Children.Add(text);

                    }else if (aviso.tipo == "1" && GlobalVariables.permissao == "1")
                    {
                        //Cria uma nova label e adiciona ao stacklayout com o nome de stackRestrito
                        Label text = new Label{ Text= aviso.aviso, TextColor = Color.White, Margin = new Thickness(10,0,0,0), FontSize = 12, FontFamily = Device.RuntimePlatform == Device.iOS ? "Raleway-Light" : Device.RuntimePlatform == Device.Android ? "Raleway-Light.ttf#Raleway-Light" : null };

                            var tapGestureRecognizer = new TapGestureRecognizer();
                            tapGestureRecognizer.Tapped += (sender, e) =>
                            {
                                var avisoId = new Avisos
                                {
                                    aviso = aviso.aviso,
                                    texto = aviso.texto,


                                };

                                var newPage = new AvisosId();
                                newPage.BindingContext = avisoId;
                                App.Current.MainPage = new Menu { Detail = new NavigationPage(newPage) };

                            };

                            text.GestureRecognizers.Add(tapGestureRecognizer);

                            stackRestrito.Children.Add(text);
                    }
                }
                    

                }
                catch (Exception e)
                {
                    DisplayAlert("Alerta", "Verifique sua conexão à Internet", "OK");
                    Console.Write(e);
                }


            });
        }

        

        //Abre o menu
        private void MasterDetailButton_Pressed(object sender, EventArgs e)
        {
            (App.Current.MainPage as MasterDetailPage).IsPresented = true;
        }

        private void voltarinicio(object sender, EventArgs e)
        {
            App.Current.MainPage = new Menu { Detail = new NavigationPage(new MainPage()) };
        }

        protected override bool OnBackButtonPressed()
        {
            return true;
        }
    }
}