; Taken from: http://programmingpraxis.com/standard-prelude/#unit-testing
(define-syntax assert
  (syntax-rules ()
    ((assert expr result)
     (if (equal? expr result)
         (display #\.)
         (for-each display `(#\newline
                             "-----------------"
                             #\newline
                             "Failed assertion: "
                             expr
                             #\newline
                             "Expected: " ,result
                             #\newline
                             "Returned: " ,expr
                             #\newline
                             "-----------------"))))))
