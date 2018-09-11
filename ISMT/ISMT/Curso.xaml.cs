using ISMT.Api;
using ISMT.info_curso;
using ISMT.Model;
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
	public partial class Curso : ContentPage
	{
        

        public Curso ()
		{
			InitializeComponent ();
            NavigationPage.SetHasNavigationBar(this, false);


            

            if (GlobalVariables.permissao == "1")
            {
                Image img1 = new Image{Source = "curso_horario" };
                Image img2 = new Image { Source = "curso_docente" };
                Image img3 = new Image { Source = "curso_calendario" };
                Image img4 = new Image { Source = "curso_exames" };
                Image img5 = new Image { Source = "curso_propina" };

                
                var tapGestureRecognizer = new TapGestureRecognizer();
                tapGestureRecognizer.Tapped += (sender, e) =>
                {

                    img1.ScaleTo(0.9, 50, Easing.CubicOut);
                    img1.ScaleTo(1, 50, Easing.CubicIn);

                    Task.Delay(200);
                    App.Current.MainPage = new Menu { Detail = new NavigationPage(new info_curso.Horarios()) };

                };

                img1.GestureRecognizers.Add(tapGestureRecognizer);

                var tapGestureRecognizer2 = new TapGestureRecognizer();
                tapGestureRecognizer2.Tapped += (sender, e) =>
                {

                    img2.ScaleTo(0.9, 50, Easing.CubicOut);
                    img2.ScaleTo(1, 50, Easing.CubicIn);

                    Task.Delay(200);

                    App.Current.MainPage = new Menu { Detail = new NavigationPage(new info_curso.Docentes()) };

                };

                img2.GestureRecognizers.Add(tapGestureRecognizer2);


                var tapGestureRecognizer3 = new TapGestureRecognizer();
                tapGestureRecognizer3.Tapped += (sender, e) =>
                {

                    img3.ScaleTo(0.9, 50, Easing.CubicOut);
                    img3.ScaleTo(1, 50, Easing.CubicIn);

                    Task.Delay(200);
                    App.Current.MainPage = new Menu { Detail = new NavigationPage(new info_curso.Semestre()) };

                };

                img3.GestureRecognizers.Add(tapGestureRecognizer3);

                var tapGestureRecognizer4 = new TapGestureRecognizer();
                tapGestureRecognizer4.Tapped += (sender, e) =>
                {

                    img4.ScaleTo(0.9, 50, Easing.CubicOut);
                    img4.ScaleTo(1, 50, Easing.CubicIn);

                    Task.Delay(200);
                    App.Current.MainPage = new Menu { Detail = new NavigationPage(new info_curso.Exames()) };

                };

                img4.GestureRecognizers.Add(tapGestureRecognizer4);


                var tapGestureRecognizer5 = new TapGestureRecognizer();
                tapGestureRecognizer5.Tapped += (sender, e) =>
                {

                    img5.ScaleTo(0.9, 50, Easing.CubicOut);
                    img5.ScaleTo(1, 50, Easing.CubicIn);

                    Task.Delay(200);
                    App.Current.MainPage = new Menu { Detail = new NavigationPage(new info_curso.Propinas()) };

                };

                img5.GestureRecognizers.Add(tapGestureRecognizer5);

                stacklayout.Children.Add(img1);
                stacklayout.Children.Add(img2);
                stacklayout.Children.Add(img3);
                stacklayout.Children.Add(img4);
                stacklayout.Children.Add(img5);
                
            }
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

        async void irobjectivo(object sender, EventArgs e)
        {
            
            await objectivo.ScaleTo(0.9, 50, Easing.CubicOut);
            await objectivo.ScaleTo(1, 50, Easing.CubicIn);

            await Task.Delay(200);
            App.Current.MainPage = new Menu { Detail = new NavigationPage(new Objectivo()) };
        }

        async void iracesso(object sender, EventArgs e)
        {

            await acesso.ScaleTo(0.9, 50, Easing.CubicOut);
            await acesso.ScaleTo(1, 50, Easing.CubicIn);

            await Task.Delay(200);
            App.Current.MainPage = new Menu { Detail = new NavigationPage(new Acesso()) };
        }

        async void irplano(object sender, EventArgs e)
        {

            await plano.ScaleTo(0.9, 50, Easing.CubicOut);
            await plano.ScaleTo(1, 50, Easing.CubicIn);

            await Task.Delay(200);
            App.Current.MainPage = new Menu { Detail = new NavigationPage(new Plano()) };
        }

        async void irprofissional(object sender, EventArgs e)
        {

            await profissional.ScaleTo(0.9, 50, Easing.CubicOut);
            await profissional.ScaleTo(1, 50, Easing.CubicIn);

            await Task.Delay(200);
            App.Current.MainPage = new Menu { Detail = new NavigationPage(new Profissional()) };
        }





        protected override bool OnBackButtonPressed()
        {
            return true;
        }
    }
}