using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

using Xamarin.Forms;
using Xamarin.Forms.Xaml;
using ISMT.Api;
namespace ISMT
{
	[XamlCompilation(XamlCompilationOptions.Compile)]
	public partial class Menu : MasterDetailPage
	{
		public Menu ()
		{
			InitializeComponent ();

            //this is for no nav bar at top
            var Homepage = new MainPage();
            NavigationPage.SetHasNavigationBar(Homepage, false);
            Detail = new NavigationPage(Homepage);
            IsPresented = false; //this will make the side menu disappear when you select a page

            if(GlobalVariables.privilegio=="1")
            {
                prof1.IsVisible = true;
                prof2.IsVisible = true;
            }else
            {
                prof1.IsVisible = false;
                prof2.IsVisible = false;
            }

            if(GlobalVariables.permissao=="1")
            {
                loginname.Text = "Logout";
            }else
            {
                loginname.Text = "Login";
            }
        }

        private void Button_Clicked_Home(object sender, EventArgs e)
        {
            var Homepage = new MainPage();
            NavigationPage.SetHasNavigationBar(Homepage, false);
            Detail = new NavigationPage(Homepage);
            IsPresented = false; //this will make the side menu disappear when you select a page
        }

        private void Button_Clicked_Evento(object sender, EventArgs e)
        {
            var Evento = new Evento();
            NavigationPage.SetHasNavigationBar(Evento, false);
            Detail = new NavigationPage(Evento);
            IsPresented = false; //this will make the side menu disappear when you select a page
        }

        private void Button_Clicked_Aviso(object sender, EventArgs e)
        {
            var Aviso = new Aviso();
            NavigationPage.SetHasNavigationBar(Aviso, false);
            Detail = new NavigationPage(Aviso);
            IsPresented = false; //this will make the side menu disappear when you select a page
        }

        private void Button_Clicked_Contacto(object sender, EventArgs e)
        {
            var Contacto = new Contacto();
            NavigationPage.SetHasNavigationBar(Contacto, false);
            Detail = new NavigationPage(Contacto);
            IsPresented = false; //this will make the side menu disappear when you select a page
        }

        private void Button_Clicked_Curso(object sender, EventArgs e)
        {
            var Curso = new Curso();
            NavigationPage.SetHasNavigationBar(Curso, false);
            Detail = new NavigationPage(Curso);
            IsPresented = false; //this will make the side menu disappear when you select a page
        }

        private void Button_Clicked_Emprego(object sender, EventArgs e)
        {
            var Emprego = new Emprego();
            NavigationPage.SetHasNavigationBar(Emprego, false);
            Detail = new NavigationPage(Emprego);
            IsPresented = false; //this will make the side menu disappear when you select a page
        }

        private void Button_Clicked_Login(object sender, EventArgs e)
        {
            if (GlobalVariables.permissao == "1")
            {
                GlobalVariables.permissao = "0";
                GlobalVariables.permissao = "";
                GlobalVariables.utilizador = "";
                App.Current.MainPage = new Menu { Detail = new NavigationPage(new MainPage()) };
            }
            else
            { 
            var Login = new Login();
            NavigationPage.SetHasNavigationBar(Login, false);
            Detail = new NavigationPage(Login);
            IsPresented = false; //this will make the side menu disappear when you select a page
            }
        }

        private void Button_Clicked_Noticias(object sender, EventArgs e)
        {
            var Noticias = new Noticias();
            NavigationPage.SetHasNavigationBar(Noticias, false);
            Detail = new NavigationPage(Noticias);
            IsPresented = false; //this will make the side menu disappear when you select a page
        }

        private void Button_Clicked_Opcoes(object sender, EventArgs e)
        {
            var Opcoes = new Opcoes();
            NavigationPage.SetHasNavigationBar(Opcoes, false);
            Detail = new NavigationPage(Opcoes);
            IsPresented = false; //this will make the side menu disappear when you select a page
        }

        private void Button_Clicked_Professor(object sender, EventArgs e)
        {
            var Professor = new MenuProfessor();
            NavigationPage.SetHasNavigationBar(Professor, false);
            Detail = new NavigationPage(Professor);
            IsPresented = false; //this will make the side menu disappear when you select a page
        }




        private void closemenu(object sender, EventArgs e)
        {
            (App.Current.MainPage as MasterDetailPage).IsPresented = false;
            //open the master detail page when button is clicked.
            //MasterDetailPage.IsPresentedProperty.Equals(true);
            //MenuNavigation.IsPresentedProperty.Equals(true);
        }


    }

}