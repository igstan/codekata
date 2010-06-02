(define slice
  (lambda (lst start count)
    (cond
      ((or (null? lst) (= 0 count)) '())
      ((> start 0) (slice (cdr lst) (- start 1) count))
      (else (cons (car lst)
                  (slice (cdr lst) 0 (- count 1)))))))
