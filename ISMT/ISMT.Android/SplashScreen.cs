using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

using Android.App;
using Android.Content;
using Android.Content.PM;
using Android.OS;
using Android.Runtime;
using Android.Views;
using Android.Widget;

namespace ISMT.Droid
{
    [Activity(Label = "ISMT",
       Icon = "@drawable/icon",
       Theme = "@style/splashscreen",
       MainLauncher = true,
       NoHistory = true, ConfigurationChanges = ConfigChanges.ScreenSize | ConfigChanges.Orientation, ScreenOrientation = ScreenOrientation.Portrait)]
    class SplashScreen : Activity
    {
        protected override void OnResume()
        {
            base.OnResume();
            StartActivity(typeof(MainActivity));
        }
    }
}