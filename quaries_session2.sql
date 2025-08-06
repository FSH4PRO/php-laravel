INSERT INTO comments(content,user_id,post_id) VALUES('hi i am learning mysql',5,3);

UPDATE posts set title = 'learning mysql' where post_id = 1;

DELETE FROM comments WHERE comment_id = 13;

SELECT title,COUNT(comment_id) as number_of_comments FROM posts left JOIN comments ON posts.post_id = comments.post_id GROUP by post_id;


SELECT * FROM posts JOIN users on posts.user_id=users.user_id LEFT JOIN post_category on post_category.post_id = posts.post_id LEFT JOIN categories on post_category.category_id = categories.category_id 