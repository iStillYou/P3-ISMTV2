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
	public partial class Evento : ContentPage
	{
		public Evento ()
		{
			InitializeComponent ();
            NavigationPage.SetHasNavigationBar(this, false);
        }

        private void MasterDetailButton_Pressed(object sender, EventArgs e)
        {
            (App.Current.MainPage as MasterDetailPage).IsPresented = true;
            //open the master detail page when button is clicked.
            //MasterDetailPage.IsPresentedProperty.Equals(true);
            //MenuNavigation.IsPresentedProperty.Equals(true);
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