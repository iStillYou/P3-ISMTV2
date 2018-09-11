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
	public partial class Horarios : ContentPage
	{
        private WebService servidor;

        public Horarios ()
		{
			InitializeComponent ();

            NavigationPage.SetHasNavigationBar(this, false);

            Device.BeginInvokeOnMainThread(() =>
            {
                try
                {


                    //Usa o api webservice.cs && model avisos para constuir a lista usa Newjson
                    servidor = new WebService();
                    List<Model.Horarios> listaHorarios = JsonConvert.DeserializeObject<List<Model.Horarios>>(servidor.PedidoServidor("http://ismtapp.ismtprogramacao.x10host.com/api/horariosapi").ReadLine());

                    foreach (Model.Horarios horarios in listaHorarios)
                    {

                        //Cria uma nova label e adiciona ao stacklayout com o nome de stackGerais
                        Label text = new Label
                        {
                            Text = "Hora: " + horarios.hora
                            + "\nAula | Sala: " + horarios.texto,
                            TextColor = Color.White,
                            Margin = new Thickness(10, 0, 0, 0),
                            FontSize = 12,
                            FontFamily = Device.RuntimePlatform == Device.iOS ? "Raleway-Light" : Device.RuntimePlatform == Device.Android ? "Raleway-Light.ttf#Raleway-Light" : null
                        };

                        if(horarios.anoLetivo=="1")
                        {
                            if(horarios.diasemana=="Segunda")
                            {
                                stack1anosegunda.Children.Add(text);
                            }else if(horarios.diasemana == "Terça")
                            {
                                stack1anoterca.Children.Add(text);
                            }
                            else if (horarios.diasemana == "Quarta")
                            {
                                stack1anoquarta.Children.Add(text);
                            }
                            else if (horarios.diasemana == "Quinta")
                            {
                                stack1anoquinta.Children.Add(text);
                            }
                            else if (horarios.diasemana == "Sexta")
                            {
                                stack1anosexta.Children.Add(text);
                            }

                        }
                        else if(horarios.anoLetivo=="2")
                        {
                            if (horarios.diasemana == "Segunda")
                            {
                                stack2anosegunda.Children.Add(text);
                            }
                            else if (horarios.diasemana == "Terça")
                            {
                                stack2anoterca.Children.Add(text);
                            }
                            else if (horarios.diasemana == "Quarta")
                            {
                                stack2anoquarta.Children.Add(text);
                            }
                            else if (horarios.diasemana == "Quinta")
                            {
                                stack2anoquinta.Children.Add(text);
                            }
                            else if (horarios.diasemana == "Sexta")
                            {
                                stack2anosexta.Children.Add(text);
                            }
                        }
                        else
                        {
                            if (horarios.diasemana == "Segunda")
                            {
                                stack3anosegunda.Children.Add(text);
                            }
                            else if (horarios.diasemana == "Terça")
                            {
                                stack3anoterca.Children.Add(text);
                            }
                            else if (horarios.diasemana == "Quarta")
                            {
                                stack3anoquarta.Children.Add(text);
                            }
                            else if (horarios.diasemana == "Quinta")
                            {
                                stack3anoquinta.Children.Add(text);
                            }
                            else if (horarios.diasemana == "Sexta")
                            {
                                stack3anosexta.Children.Add(text);
                            }
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