import 'package:flutter/material.dart';

void main() {
  runApp(
    MaterialApp(
      home: Scaffold(
        backgroundColor: Colors.white,
        body: Center(
          child: Column(
            mainAxisAlignment: MainAxisAlignment.center,
            children: [
              Spacer(flex: 1),
              Image.asset(
                'assets/greengard-logo.png',
                height: 200.0,
                width: 200.0,
              ),

              // Add space between images
              SizedBox(height: 200.0),

              Image.asset('assets/greengard-text.png'),
              Spacer(flex: 2),
            ],
          ),
        ),
      ),
    ),
  );
}
