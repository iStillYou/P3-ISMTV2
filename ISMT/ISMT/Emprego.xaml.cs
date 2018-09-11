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
	public partial class Emprego : ContentPage
	{
        private WebService servidor;

        public Emprego ()
		{
			InitializeComponent ();
            NavigationPage.SetHasNavigationBar(this, false);

            Device.BeginInvokeOnMainThread(() =>
            {
                try
                {


                    //Usa o api webservice.cs && model avisos para constuir a lista usa Newjson
                    servidor = new WebService();
                    List<PropostasEmprego> ListaEmprego = JsonConvert.DeserializeObject<List<PropostasEmprego>>(servidor.PedidoServidor("http://ismtapp.ismtprogramacao.x10host.com/api/empregoapi").ReadLine());

                    foreach (PropostasEmprego emprego in ListaEmprego)
                    {
                        
                            //Cria uma nova label e adiciona ao stacklayout com o nome de stackGerais
                            Label text = new Label { Text = "Data: " + emprego.data + "\nEmpresa: " + emprego.empresa
                                + "\nFunção: " + emprego.funcao + "\nLocal: " + emprego.localizacao, TextColor = Color.White, Margin = new Thickness(10, 0, 0, 0), FontSize = 12, FontFamily = Device.RuntimePlatform == Device.iOS ? "Raleway-Light" : Device.RuntimePlatform == Device.Android ? "Raleway-Light.ttf#Raleway-Light" : null };

                        BoxView linha = new BoxView { HorizontalOptions = LayoutOptions.Fill, HeightRequest = 1, Color = Color.FromHex("DCDCDC"), Margin = new Thickness(50,10,50,10) };
                            stackGerais.Children.Add(text);
                        stackGerais.Children.Add(linha);

                       
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