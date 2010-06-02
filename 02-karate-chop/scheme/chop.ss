(load "util.ss")

(define chop
  (lambda (needle haystack)
    (if (null? haystack) -1
        (let* ((length (length haystack))
               (middle (floor (/ length 2)))
               (current (list-ref haystack middle)))
          (cond
            ((= current needle) middle)
            ((> current needle) (chop needle (slice haystack 0 middle)))
            ((< current needle)
             (let ((result (chop needle (slice haystack (+ 1 middle) length))))
               (if (= -1 result) -1
                   (+ 1 middle result))))
            (else -1))))))
