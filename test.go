package main

import "fmt"

func main() {
	var x float64
	var e int

	x = 20.0
	fmt.Println(x)
	fmt.Printf("%.2f is of type %T\n", x, x)

	fmt.Scanf("%d", &e)
	fmt.Println(e)
}
