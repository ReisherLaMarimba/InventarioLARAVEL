using System;
using System.Collections.Generic;
using System.Diagnostics.Contracts;
using System.Globalization;
using System.IO;
using System.Linq;
using System.Runtime.Remoting.Channels;
using System.Text;
using System.Threading.Tasks;
using NUnit.Framework;
using OpenQA.Selenium;
using OpenQA.Selenium.Chrome;
using AventStack.ExtentReports.Reporter;
using AventStack.ExtentReports;
using RazorEngine.Compilation.ImpromptuInterface;

namespace Automatizacion
{

    [TestFixture]
    public class Program
    {
        IWebDriver driver = new ChromeDriver();
        private string url = "http://127.0.0.1:8000";
        ExtentReports extent = null;
        public static void tomarSs(string mensaje, Screenshot screen)
        {
            
            string tiempo = DateTime.Now.ToString("hh_mm_ss tt");
           
            if (File.Exists(@"..\..\SCREENSHOTS\SCREENSHOTS\"+mensaje + tiempo + ".png"))
            {
                screen.SaveAsFile(@"..\..\SCREENSHOTS\" + mensaje + tiempo + ".png",
                    ScreenshotImageFormat.Png);
                Console.WriteLine("tomando screnshot");
            }
            else
            {
                screen.SaveAsFile(@"..\..\SCREENSHOTS\"+mensaje + tiempo + ".png",
                    ScreenshotImageFormat.Png);
                Console.WriteLine("tomando screnshot");
            }
        }
      
        static void Main(string[] args)
        {
           

        }

        [OneTimeSetUp]
        public void ExtentInicio()
        {
            extent = new ExtentReports();
            var ReporteHtml = new ExtentHtmlReporter(@"..\..\REPORTS\Reporte.html");
            extent.AttachReporter(ReporteHtml);
        }

        [OneTimeTearDown]
        public void ExtentCierre()
        {
            extent.Flush(); 
        }
           
    

     
          
         

            [Test]
        public void Prueba1Inicio()
        {
            ExtentTest test = null;
                try
                {
                    test = extent.CreateTest("Test1").Info("TEST INICIADO");
                  
                    driver.FindElement(By.Name("email")).SendKeys("Prueba1@gmail.com");
                    driver.FindElement(By.Name("password")).SendKeys("13216544568");
                    Console.WriteLine("Insertando usuario desconocido");
                    test.Log(Status.Info, "Insertando usuario desconocido");
                    IWebElement boton_enviar = driver.FindElement(By.Id("btn_submit"));
                    boton_enviar.Click();
                test.Log(Status.Pass, "Respuesta a usuario erroneo obtenida");
                test.Log(Status.Info, "Forzando error");
                Console.WriteLine("Forzando error");
                    driver.Manage().Window.FullScreen();

                    Screenshot ss = ((ITakesScreenshot)driver).GetScreenshot();
                    tomarSs("Error_usuario_no_existe_", ss);
                    test.Log(Status.Info, "Error usuario no existe");
                    test.Log(Status.Pass, "Prueba 1");
             
                }
                catch (Exception e)
                {
                    throw;
                }
            }

           
       

            [SetUp]
            public void PreparacionPrueba1()
            {
                driver.Navigate().GoToUrl(url);
                Console.WriteLine("Entrando a la pagina");

            }







            [Test]
            public void Prueba2Inicio()
            {
                ExtentTest test = null;
            try
                {
                    test = extent.CreateTest("Test2").Info("TEST INICIADO");
                string tiempo = DateTime.Now.ToString("hh_mm_ss tt");
                    driver.FindElement(By.LinkText("Register a new membership")).Click();
                test.Log(Status.Info, "Accediendo a crear nuevo usuarip");
                Console.WriteLine("Entrando a pagina de registro");
                    driver.FindElement(By.Name("name")).SendKeys("Test1USER1");
                    driver.FindElement(By.Name("email")).SendKeys("Test1USER@test11.com");
                    driver.FindElement(By.Name("password")).SendKeys("Test1USER1");
                    driver.FindElement(By.Name("password_confirmation")).SendKeys("Test1USER1");
                test.Log(Status.Info, "Llenando apartados con informacion del nuevo usuario");
                IWebElement boton_registro = driver.FindElement(By.Id("boton_registro"));
                    Console.WriteLine("Insertando datos de logeo");

                    boton_registro.Click();
                test.Log(Status.Pass, "Nuevo usuario creado perfectamente");
                driver.Manage().Window.FullScreen();
                    Screenshot ss = ((ITakesScreenshot)driver).GetScreenshot();
                    tomarSs("Creando_nuevo_usuario_en_registro_y_acceder_a_aplicacion", ss);
                
            }
                catch (Exception e)
                {
                    throw e;
                }
            }

        
          

            [SetUp]
            public void PreparacionTest()
            {
                driver.Navigate().GoToUrl(url);
                Console.WriteLine("Entrando a la pagina");

            }

       


        
            

            [Test]
            public void Prueba3Inicio()
            {
            ExtentTest test = null;
            try {
                test = extent.CreateTest("Test3").Info("TEST INICIADO");
                driver.FindElement(By.Name("email")).SendKeys("Test1USER@test11.com");
                driver.FindElement(By.Name("password")).SendKeys("Test1USER1");
                Console.WriteLine("Insertando usuario ya creado");
                IWebElement boton_enviar = driver.FindElement(By.Id("btn_submit"));
                boton_enviar.Click();
                test.Log(Status.Info, "Iniciando con datos creados en el test anterior");
                Console.WriteLine("Iniciando sesion");
                driver.Manage().Window.FullScreen();
                Screenshot ss = ((ITakesScreenshot)driver).GetScreenshot();
                tomarSs("Iniciando_sesion_usuario_creado_en_prueba2_", ss);
                test.Log(Status.Pass, "Prueba completada, login con usuario testeado");
                

            }
            catch(Exception e)
            {
                throw e;
            }
            }

        

            [SetUp]
            public void PreparacionPrueba3()
            {
                driver.Navigate().GoToUrl(url);
                Console.WriteLine("Entrando a la pagina");

                
             }



        [Test]
        public void prueba4Inicio()
        {
            
            ExtentTest test = null;
            try
            {
                test = extent.CreateTest("Test4").Info("TEST INICIADO");
                String currentURL = driver.Url;
                test.Log(Status.Warning, "Detectando URL actual para aplicar test");
                if (currentURL == "http://127.0.0.1:8000/login")
                {
                    test.Log(Status.Info, "Iniciando sesion para crear un nuevo usuario");
                    driver.FindElement(By.Name("email")).SendKeys("Test1USER@test11.com");
                    driver.FindElement(By.Name("password")).SendKeys("Test1USER1");
                    Console.WriteLine("Insertando usuario ya creado");
                    var boton_enviar = driver.FindElement(By.Id("btn_submit"));
                    boton_enviar.Click();
                    Console.WriteLine("Iniciando sesion PARA ARIR HERRAMIENTAS");
                    //Yendo a crear item
                    test.Log(Status.Warning, "Test en [CREAR NUEVO EMPLEADO]");
                    driver.Navigate().GoToUrl("http://127.0.0.1:8000/persons/crear");
                    var ss1 = ((ITakesScreenshot)driver).GetScreenshot();
                    tomarSs("Dentro_apartado_creacion_usuarios", ss1);
                    driver.FindElement(By.Name("codigo_empleado")).SendKeys("TEST-001");
                    driver.FindElement(By.Name("nombre")).SendKeys("EjemploNombre");
                    driver.FindElement(By.Name("apellido")).SendKeys("EjeploAplleido");
                    driver.FindElement(By.Name("encargado")).SendKeys("Qa");
                    driver.FindElement(By.Name("departamento")).SendKeys("QA de nuevo");
                    var ss2 = ((ITakesScreenshot)driver).GetScreenshot();
                    tomarSs("Datos_insertados_para_creacion", ss2);
                    test.Log(Status.Warning, "Tomando screenshot de datos aplicados");
                    var boton_enviar_empleado = driver.FindElement(By.Id("crear_empleado"));
                    boton_enviar_empleado.Submit();
                    driver.Manage().Window.FullScreen();
                    var ss3 = ((ITakesScreenshot)driver).GetScreenshot();
                    tomarSs("Empleado_creado", ss3);
                    test.Log(Status.Pass, "´Prueba obtenida, pueden ser verificadas en la ruta reportes dentro del proyecto");


                }
                else
                { if (currentURL != "http://127.0.0.1:8000/login")
                    {





                        //Yendo a crear item
                        driver.Navigate().GoToUrl("http://127.0.0.1:8000/persons/crear");

                        var ss1 = ((ITakesScreenshot)driver).GetScreenshot();
                        test.Log(Status.Info, "Accediendo a modulo de creacion de empleados");
                        tomarSs("Dentro_apartado_creacion_usuarios", ss1);
                        driver.FindElement(By.Name("codigo_empleado")).SendKeys("TEST-001");
                        driver.FindElement(By.Name("nombre")).SendKeys("EjemploNombre");
                        driver.FindElement(By.Name("apellido")).SendKeys("EjeploAplleido");
                        driver.FindElement(By.Name("encargado")).SendKeys("Qa");
                        driver.FindElement(By.Name("departamento")).SendKeys("QA de nuevo");
                        test.Log(Status.Info, "Insertando datos de prueba de primer usuario");
                        var ss2 = ((ITakesScreenshot)driver).GetScreenshot();
                        tomarSs("Datos_insertados_para_creacion", ss2);
                        var boton_enviar_empleado = driver.FindElement(By.Id("crear_empleado"));
                        boton_enviar_empleado.Submit();
                        test.Log(Status.Pass,"Correctame enviado formulario de nuevo empleado");
                        driver.Manage().Window.FullScreen();
                        var ss3 = ((ITakesScreenshot)driver).GetScreenshot();
                        tomarSs("Empleado_creado", ss3);
                        test.Log(Status.Pass,"Test completado correctamente. Revisar screenshots en la ruta indicada ::REPORTS dentro del repositorio");

                    }
                }
            }catch(Exception e)
            {
                throw e;
            }
            }

          
            [SetUp]
            public void PreparacionPrueba4()
            {
                driver.Navigate().GoToUrl(url);
                Console.WriteLine("Entrando a la pagina");





            }





        
    }
}
