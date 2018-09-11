using System;
using System.Collections.Generic;
using System.IO;
using System.Net;
using System.Net.Http;
using System.Text;
using System.Threading.Tasks;

namespace ISMT.Api
{
    class WebService
    {
        public StreamReader PedidoServidor(string uri)
        {
            //é necessário instalar o package 'Microsoft.Net.Http' do NuGet Installer
            //é necessário importar a biblioteca System.Net, System.IO e Newtonsoft.Json
            HttpWebRequest webrequest = (HttpWebRequest)WebRequest.Create(new Uri(uri));
            webrequest.ContentType = "application/json";

            var pedido = webrequest.BeginGetResponse(new AsyncCallback(WebRequestCallback), webrequest);
            HttpWebResponse resposta = (pedido.AsyncState as HttpWebRequest).EndGetResponse(pedido) as HttpWebResponse;
            StreamReader stream = new StreamReader(resposta.GetResponseStream(), Encoding.UTF8);

            return stream;
        }

        /* Não foi utilizado
        public async Task<string> PedidoLogin(string url,string username, string password)
        {
            using (var client = new HttpClient())
            {
                var content = new FormUrlEncodedContent(new[]
                {
                        new KeyValuePair<string,string>("Username", username),
                        new KeyValuePair<string, string>("Password", password)

                    });

                var result = await client.PostAsync(url, content);
                return await result.Content.ReadAsStringAsync();
            }
        }

        public async Task<string> PedidoNoticia(string url, string id)
        {
            using (var client = new HttpClient())
            {
                var content = new FormUrlEncodedContent(new[]
                {
                        new KeyValuePair<string,string>("id", "id")

                    });

                var result = await client.PostAsync(url, content);
                return await result.Content.ReadAsStringAsync();
            }
        } */

        private void WebRequestCallback(IAsyncResult result)
        {
            //é obrigatório estar aqui
        }
    }
}
