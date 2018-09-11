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
	public partial class Noticias : ContentPage
	{
        private WebService servidor;
        int i = 0;

        public Noticias ()
		{
			InitializeComponent ();
            NavigationPage.SetHasNavigationBar(this, false);

            Device.BeginInvokeOnMainThread(() =>
            {
                try
                {
                    //Usa o api webservice.cs && model avisos para constuir a lista
                    servidor = new WebService();
                    List<Noticia> ListaNoticia = JsonConvert.DeserializeObject<List<Noticia>>(servidor.PedidoServidor("http://ismtapp.ismtprogramacao.x10host.com/api/noticiasapi").ReadLine());

                    foreach (Noticia noticia in ListaNoticia)
                    {
                        

                        AbsoluteLayout absoluteLayout = new AbsoluteLayout { HorizontalOptions = LayoutOptions.FillAndExpand};
                        Image image = new Image { Source = "noticia1_sample.png", HeightRequest = 172 , HorizontalOptions = LayoutOptions.FillAndExpand};
                        BoxView box = new BoxView { BackgroundColor = Color.FromHex("#223E7F"), Opacity = .38, };
                        StackLayout stack = new StackLayout { Margin = new Thickness(6,0,6,0)  };
                        
                        if(i % 2 == 0)
                        { 
                        AbsoluteLayout.SetLayoutBounds(box, new Rectangle(0, 0.5, .45, .96));
                        AbsoluteLayout.SetLayoutBounds(stack, new Rectangle(0, 0.5, .45, .96));
                        }else
                        {
                        AbsoluteLayout.SetLayoutBounds(box, new Rectangle(1, 0.58, .45, .96));
                        AbsoluteLayout.SetLayoutBounds(stack, new Rectangle(1, 0.58, .45, .96));
                        }

                        AbsoluteLayout.SetLayoutFlags(stack, AbsoluteLayoutFlags.All);
                        AbsoluteLayout.SetLayoutFlags(box, AbsoluteLayoutFlags.All);
                        Label data = new Label { Text = noticia.data, TextColor = Color.White, FontSize = 6, Margin = new Thickness(0, 8, 0, 8), FontFamily = Device.RuntimePlatform == Device.iOS ? "Raleway-Light" : Device.RuntimePlatform == Device.Android ? "Raleway-Light.ttf#Raleway-Light" : null };
                        Label titulo = new Label { Text = noticia.titulo, TextColor = Color.White, FontSize = 13, FontAttributes = FontAttributes.Bold, Margin = new Thickness(0, 2, 0, 2), FontFamily = Device.RuntimePlatform == Device.iOS ? "Raleway-Light" : Device.RuntimePlatform == Device.Android ? "Raleway-Light.ttf#Raleway-Light" : null };
                        Label texto = new Label { Text = noticia.texto, TextColor = Color.White, FontSize = 10, Margin = new Thickness(0, 2, 0, 10), FontFamily = Device.RuntimePlatform == Device.iOS ? "Raleway-Light" : Device.RuntimePlatform == Device.Android ? "Raleway-Light.ttf#Raleway-Light" : null };
                        Label saibaMais = new Label { Text = "Saiba mais", TextColor = Color.White, FontSize = 10, VerticalTextAlignment = TextAlignment.Center, HorizontalOptions = LayoutOptions.Center, FontFamily = Device.RuntimePlatform == Device.iOS ? "Raleway-Light" : Device.RuntimePlatform == Device.Android ? "Raleway-Light.ttf#Raleway-Light" : null };

                        var tapGestureRecognizer = new TapGestureRecognizer();
                        tapGestureRecognizer.Tapped += (sender, e) =>
                        {
                            var noticiaId = new Noticia
                            {
                                data = noticia.data,
                                titulo = noticia.titulo,
                                texto = noticia.texto
                                

                            };

                            var newPage = new NoticiaId();
                            newPage.BindingContext = noticiaId;
                            App.Current.MainPage = new Menu { Detail = new NavigationPage(newPage) };

                        };

                        image.GestureRecognizers.Add(tapGestureRecognizer);

                        absoluteLayout.Children.Add(image);
                        absoluteLayout.Children.Add(box);

                        stack.Children.Add(data);
                        stack.Children.Add(titulo);
                        stack.Children.Add(texto);
                        stack.Children.Add(saibaMais);

                        absoluteLayout.Children.Add(stack);

                        stackLayout.Children.Add(absoluteLayout);

                        i++;
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