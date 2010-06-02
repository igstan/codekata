(load "test.ss")
(load "chop.ss")

(assert (chop 3 '()) -1)
(assert (chop 3 '(1)) -1)
(assert (chop 1 '(1)) 0)

(assert (chop 1 '(1 3 5)) 0)
(assert (chop 3 '(1 3 5)) 1)
(assert (chop 5 '(1 3 5)) 2)

(assert (chop 47 '(1 1 2 2 3 6 6 7 8 8 8 9 11 18 18 18 19 19 20 21 22 24 24 26 27 28 29 30 32 34 37 37 38 38 39 42 42 42 42 42 42 43 43 44 45 47 48 48 50 52 52 52 52)) 45)