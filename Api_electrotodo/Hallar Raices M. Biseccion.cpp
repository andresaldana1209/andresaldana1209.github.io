
//Trabajo Presentado por Andrés Felipe Aldana Salazar
//                                  y
//                       Luis David Hernandez Abad
#include <iostream>
#include <iomanip> 
#include <cmath>

#define PRECISION 6

using namespace std;

double f(double x);
void imprimePuntos(double a, double b);

int main()
{
   cout << setprecision(PRECISION);
   
   double a, b, tolerancia;
   
   cout << "\nEste programa Calcula las raices para una funcion con n raices\n";
   cout << "\nHallar las raices de la funcion F(x)=sin(x) + cos(1+(x^2))-1  aplicando el metodo de la biseccion" << endl;
   cout << "\nIngrese el intervalo inicial [a, b]" << endl;
   cout << "\na = ";
   cin >> a;
   
   cout << "b = ";
   cin >> b;
   
   imprimePuntos(a, b);
   
   cout << "\nEscoja el intervalo adecuado" << endl;
   cout << "\na = ";
   cin >> a;
   
   cout << "b = ";
   cin >> b;
   
   
   float xr;
   
  
   
   if (f(a) * f(b) > 0) {
      
      cout << "\nNo se puede aplicar el metodo de la biseccion\n";
      cout << "porque f(" << a << ") y f(" << b << ") tienes el mismo signo" << endl;
      
   } else {
      cout << "Tolerancia = ";
      cin >> tolerancia;
      cout << "\na\tb\tx\tf(a)\t\tf(b)\t\tf(x)\n" << endl;
      do {
         xr = (a + b) / 2.0;
         cout << a << "\t" << b << "\t" << xr << "\t";
         cout << f(a) << "\t" << f(b) << "\t" << f(xr) << endl;

         
         if (abs(f(xr)) <= tolerancia) { 
         
            cout << "\n\nPara una tolerancia " << tolerancia << " la RAIZ de F(x)=sin(x) + cos(1+(x^2))-1 es de= " << xr << endl;
         
            break;
            
         } else {
            if (f(xr) * f(a) > 0) {
               a = xr;
            } else if (f(xr) * f(b) > 0) {
               b = xr;
            }
         }
         
      } while (1);
   }
   
   cout << "Trabajo presentado por: Andres Aldana y Luis Hernandez Abad";
   
   cin.get();
   cin.get();
  
   
   
   
   return 0;
}


double f(double x) 
{
   return sin(x) + cos(1+(pow(x,2)))-1;
}

#define INTERVALOS 10
void imprimePuntos(double a, double b)
{
   int puntos = INTERVALOS + 1;
   
   double ancho = (b - a) / INTERVALOS;
   
   cout << "\n";
   cout << "\tx\tf(x)\n" << endl;
   for (int i = 0; i < puntos; i++) {
      cout << "\t" << a << "\t" << f(a) << endl;
      a = a + ancho;
   }
}
