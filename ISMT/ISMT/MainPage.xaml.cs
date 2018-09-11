using ISMT.Api;
using ISMT.Model;
using Newtonsoft.Json;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using Xamarin.Forms;

namespace ISMT
{
	public partial class MainPage : ContentPage
	{
        int i = 0;
        private WebService servidor;

        public MainPage()
		{
			InitializeComponent();

            //Esconde a barra em cima
            NavigationPage.SetHasNavigationBar(this, false);

            Device.BeginInvokeOnMainThread(() =>
            {
                if (GlobalVariables.msg == "1")
                {
                    DisplayAlert("Sucesso", "Efectou o login com sucesso", "OK");
                }
            });

            Device.BeginInvokeOnMainThread(() =>
            {
                try
                {

                    //Usa o api webservice.cs && model avisos para constuir a lista
                    servidor = new WebService();
                    List<Noticia> ListaNoticia = JsonConvert.DeserializeObject<List<Noticia>>(servidor.PedidoServidor("http://ismtapp.ismtprogramacao.x10host.com/api/noticiasapi").ReadLine());

                  
                    foreach (Noticia noticia in ListaNoticia)
                    {

                        if(i<2)
                        { 
                        AbsoluteLayout absoluteLayout = new AbsoluteLayout { HorizontalOptions = LayoutOptions.FillAndExpand };
                        Image image = new Image { Source = "noticia1_sample.png", HeightRequest = 172, HorizontalOptions = LayoutOptions.FillAndExpand };
                        BoxView box = new BoxView { BackgroundColor = Color.FromHex("#223E7F"), Opacity = .38, };
                        StackLayout stack = new StackLayout { Margin = new Thickness(6, 0, 6, 0) };

                        if (i == 0)
                        {
                            AbsoluteLayout.SetLayoutBounds(box, new Rectangle(0, 0.5, .45, .96));
                            AbsoluteLayout.SetLayoutBounds(stack, new Rectangle(0, 0.5, .45, .96));
                        }
                        else
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

        //Vai para a pagina evento
        async void irevento(object sender, EventArgs e)
        {
           
            botaoevento.BackgroundColor = Color.FromHex("#22458D");
            await botaoevento.ScaleTo(0.9, 50, Easing.CubicOut);
            await botaoevento.ScaleTo(1, 50, Easing.CubicIn);

            await Task.Delay(200);
            App.Current.MainPage = new Menu { Detail = new NavigationPage(new Evento()) };

        }

        async void iraviso(object sender, EventArgs e)
        {

            botaoaviso.BackgroundColor = Color.FromHex("#22458D");
            await botaoaviso.ScaleTo(0.9, 50, Easing.CubicOut);
            await botaoaviso.ScaleTo(1, 50, Easing.CubicIn);

            await Task.Delay(200);
            App.Current.MainPage = new Menu { Detail = new NavigationPage(new Aviso()) };

        }

        async void ircurso(object sender, EventArgs e)
        {

            botaocurso.BackgroundColor = Color.FromHex("#22458D");
            await botaocurso.ScaleTo(0.9, 50, Easing.CubicOut);
            await botaocurso.ScaleTo(1, 50, Easing.CubicIn);

            await Task.Delay(200);
            App.Current.MainPage = new Menu { Detail = new NavigationPage(new Curso()) };

        }

        async void iremprego(object sender, EventArgs e)
        {

            botaoemprego.BackgroundColor = Color.FromHex("#22458D");
            await botaoemprego.ScaleTo(0.9, 50, Easing.CubicOut);
            await botaoemprego.ScaleTo(1, 50, Easing.CubicIn);

            await Task.Delay(200);
            App.Current.MainPage = new Menu { Detail = new NavigationPage(new Emprego()) };

        }

        async void irnoticias(object sender, EventArgs e)
        {

            botaonoticias.BackgroundColor = Color.FromHex("#22458D");
            await botaonoticias.ScaleTo(0.9, 50, Easing.CubicOut);
            await botaonoticias.ScaleTo(1, 50, Easing.CubicIn);

            await Task.Delay(200);
            App.Current.MainPage = new Menu { Detail = new NavigationPage(new Noticias()) };

        }

        async void iropcoes(object sender, EventArgs e)
        {

            botaoopcoes.BackgroundColor = Color.FromHex("#22458D");
            await botaoopcoes.ScaleTo(0.9, 50, Easing.CubicOut);
            await botaoopcoes.ScaleTo(1, 50, Easing.CubicIn);

            await Task.Delay(200);
            App.Current.MainPage = new Menu { Detail = new NavigationPage(new Opcoes()) };

        }




        //Desactiva o botão voltar a traz android
        protected override bool OnBackButtonPressed()
        {
            return true;
        }
    }
}
