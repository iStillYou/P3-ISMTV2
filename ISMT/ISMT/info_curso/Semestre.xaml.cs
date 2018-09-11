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
	public partial class Semestre : ContentPage
	{
        private WebService servidor;

        public Semestre ()
		{
			InitializeComponent ();

            NavigationPage.SetHasNavigationBar(this, false);

            Device.BeginInvokeOnMainThread(() =>
            {
                try
                {


                    //Usa o api webservice.cs && model avisos para constuir a lista usa Newjson
                    servidor = new WebService();
                    List<Model.Semestre> listaSemestre = JsonConvert.DeserializeObject<List<Model.Semestre>>(servidor.PedidoServidor("http://ismtapp.ismtprogramacao.x10host.com/api/semestreapi").ReadLine());

                    foreach (Model.Semestre semestre in listaSemestre)
                    {

                       
                            //Cria uma nova label e adiciona ao stacklayout com o nome de stackGerais
                            Label text = new Label
                            {
                                Text = semestre.texto + "      " + semestre.inicio
                                + "      " + semestre.fim,
                                TextColor = Color.White,
                                Margin = new Thickness(10, 0, 0, 0),
                                FontSize = 12,
                                FontFamily = Device.RuntimePlatform == Device.iOS ? "Raleway-Light" : Device.RuntimePlatform == Device.Android ? "Raleway-Light.ttf#Raleway-Light" : null
                            };

                        if(semestre.tipo=="Semestre")
                        {
                            stackSemestre.Children.Add(text);

                        }else if(semestre.tipo=="Férias")
                        {
                            stackFerias.Children.Add(text);
                        }else if(semestre.tipo=="Avaliações")
                        {
                            stackavaliacoes.Children.Add(text);
                        }else if(semestre.tipo=="Inscrições")
                        {
                            stackinscricoes.Children.Add(text);
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