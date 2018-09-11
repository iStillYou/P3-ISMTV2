using ISMT.Api;
using Newtonsoft.Json;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

using Xamarin.Forms;
using Xamarin.Forms.Xaml;

namespace ISMT.info_curso
{
	[XamlCompilation(XamlCompilationOptions.Compile)]
	public partial class Exames : ContentPage
	{
        private WebService servidor;

        public Exames ()
		{
			InitializeComponent ();
            NavigationPage.SetHasNavigationBar(this, false);

            Device.BeginInvokeOnMainThread(() =>
            {
                try
                {


                    //Usa o api webservice.cs && model exames para constuir a lista usa Newjson
                    servidor = new WebService();
                    List<Model.Exames> listaexames = JsonConvert.DeserializeObject<List<Model.Exames>>(servidor.PedidoServidor("http://ismtapp.ismtprogramacao.x10host.com/api/examesapi").ReadLine());

                    foreach (Model.Exames exame in listaexames)
                    {


                        //Cria uma nova label e adiciona ao stacklayout com o nome de stackGerais
                        Label text = new Label
                        {
                            Text = exame.unidadeCurricular
                            + "\n\nDocente: " + exame.docente + "\n\nÉpoca: Normal\nData do Exame: " + exame.dianormal + 
                            "\nHora do Exame: " + exame.horanormal + "\nSala: " + exame.salanormal
                            + "\n\nÉpoca: Recurso\nData do Exame:" + exame.diarecurso + 
                            "\nHora do Exame: " + exame.horarecurso + "\nSala: " + exame.salarecurso,
                            TextColor = Color.White,
                            Margin = new Thickness(0, 0, 0, 0),
                            FontSize = 12,
                            FontFamily = Device.RuntimePlatform == Device.iOS ? "Raleway-Light" : Device.RuntimePlatform == Device.Android ? "Raleway-Light.ttf#Raleway-Light" : null
                        };
                        BoxView linha = new BoxView { HorizontalOptions = LayoutOptions.Fill, HeightRequest = 1, Color = Color.FromHex("DCDCDC"), Margin = new Thickness(50, 10, 50, 10) };
                        var ano = exame.anoEscolar;

                        if (ano == "1º")
                        {
                            
                            
                            stack1.Children.Add(text);
                            stack1.Children.Add(linha);

                        }
                        else if (ano == "2º")
                        {
                            stack2.Children.Add(text);
                            stack2.Children.Add(linha);
                        }
                        else if (ano == "3º")
                        {
                            stack3.Children.Add(text);
                            stack3.Children.Add(linha);
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
            App.Current.MainPage = new Menu { Detail = new NavigationPage(new Curso()) };
        }

        protected override bool OnBackButtonPressed()
        {
            return true;
        }
    }
}