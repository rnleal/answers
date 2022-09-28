### Question 6
```mysql
SELECT name, department, birth,
TIMESTAMPDIFF(YEAR, birth, curdate()) as age
FROM students;
```


### Question 7
```mysql
SELECT name
FROM students
WHERE CHAR_LENGTH(name) = 4;
```

### Question 8:
What happens when the column is set to AUTO INCREMENT and if you reach maximum value in the table?
- once it reached the upper limit, it wont be able to generate a new sequence

### Question 9
```mysql
SHOW index FROM students;
```

### Question 10
Is mysql query case sensitve?
- No it is not case sensitive except if you are performing case sensitive value comparison operation on where clause

### Question 11
How to display top 50 rows
```mysql
SELECT * FROM students limit 50;
```

