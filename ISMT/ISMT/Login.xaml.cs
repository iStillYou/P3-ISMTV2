using ISMT.Api;
using ISMT.Model;
using Newtonsoft.Json;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using Mzsoft.BCrypt;
using Xamarin.Forms;
using Xamarin.Forms.Xaml;

namespace ISMT
{
	[XamlCompilation(XamlCompilationOptions.Compile)]
	public partial class Login : ContentPage
	{
        private WebService serviceWrapper;

        public Login ()
		{
			InitializeComponent ();
            NavigationPage.SetHasNavigationBar(this, false);

            if(GlobalVariables.permissao=="1")
            {
                btnlogin.Text = "LOGOUT";
                Utilizador.IsVisible = false;
                Password.IsVisible = false;
                Utilizadorframe.IsVisible = false;
                Passwordframe.IsVisible = false;

            }
            else
            {
                btnlogin.Text = "ENTRAR";
                Utilizador.IsVisible = true;
                Password.IsVisible = true;
                Utilizadorframe.IsVisible = true;
                Passwordframe.IsVisible = true;
            }
        }

        

        private void login(object sender, EventArgs e)
        {
            if (GlobalVariables.permissao == "0")
            {
                var Entry_Utilizador = Utilizador.Text;
                var Entry_Senha = Password.Text;

                Task.Run(async () =>
                {
                    await btnlogin.ScaleTo(0.95, 50, Easing.CubicOut);
                    await btnlogin.ScaleTo(1, 50, Easing.CubicIn);
                    try
                    {
                        await sendLogin(Entry_Utilizador, Entry_Senha);
                    }
                    catch (Exception)
                    {
                        Device.BeginInvokeOnMainThread(() =>
                        {
                            DisplayAlert("Alerta", "Verifique sua conexão à Internet", "OK");
                        });
                    }

                });

            }else

            {
                GlobalVariables.permissao = "0";
                GlobalVariables.msg = "";
                GlobalVariables.utilizador = "";
                App.Current.MainPage = new Menu { Detail = new NavigationPage(new MainPage()) };
            }

            
        }

        //Abre o menu
        private void MasterDetailButton_Pressed(object sender, EventArgs e)
        {
            (App.Current.MainPage as MasterDetailPage).IsPresented = true;
        }


        private async Task sendLogin(String user, String pass)
        {


            serviceWrapper = new WebService();

            var result = "";
            try
            {
                
                List<Utilizador> listaUtilizadores = JsonConvert.DeserializeObject<List<Utilizador>>(serviceWrapper.PedidoServidor("http://ismtapp.ismtprogramacao.x10host.com/api/utilizadoresapi").ReadLine());

                foreach (Utilizador utilizador in listaUtilizadores)
                {
                    
                    if (user==utilizador.username && pass==utilizador.password)
                    {
                        result = "Successo";
                        GlobalVariables.privilegio = utilizador.privilegio;
                    }
                }


                    if (result == "Successo")
                {
                    Device.BeginInvokeOnMainThread(() =>
                    {
                        //Efectou o login com sucesso
                        GlobalVariables.permissao = "1";
                        GlobalVariables.msg = "1";
                        
                        GlobalVariables.utilizador = Utilizador.Text;
                        App.Current.MainPage = new Menu { Detail = new NavigationPage(new MainPage()) };
                    });
                }
                else
                {
                    Device.BeginInvokeOnMainThread(() =>
                    {
                        DisplayAlert("Alerta", "Seu Utilizador / senha está incorreto. Por favor, tente novamente", "OK");
                    });

                }
            }
            catch (Exception)
            {
                await DisplayAlert("Alerta", "Verifique sua conexão à Internet", "OK");
            }
        }
    }
}