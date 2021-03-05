SELECT blog_post.*,attachment.attachment_id,attachment.attachment_type,post_status.added_on
									FROM blog_post,attachment,post_attachment,post_status,STATUS
									WHERE blog_post.post_id = post_attachment.post_id
									AND attachment.attachment_id = post_attachment.attachment_id
									AND status.status_id = post_status.status_id
									AND blog_post.post_id = post_status.post_id
									AND post_status.status_id=3






									SELECT attachment.`attachment_id`,attachment.`attachment_type`
											FROM blog_post,attachment,post_attachment
											WHERE blog_post.`post_id` =post_attachment.`post_id`
											AND attachment.`attachment_id`=post_attachment.`attachment_id`
											AND blog_post.`post_id`='$post_id'
											AND blog_post.`post_id` LIMIT 1





											<?php
												$image_query="SELECT post_attachment.`attachment_name`
											FROM blog_post,attachment,post_attachment
											WHERE blog_post.`post_id` = post_attachment.`post_id`
											AND attachment.`attachment_type_id` = post_attachment.`attachment_type_id`
											AND blog_post.`post_id` =1"; 
											$image_result = mysqli_query($connection,$image_query);
											$image_record = mysqli_fetch_assoc($image_result);
											?>





											SELECT blog_post.*,attachment.`attachment_type_id`,attachment.`attachment_type`,post_attachment.`attachment_name`
FROM blog_post,attachment,post_attachment,post_status,STATUS
WHERE blog_post.`post_id` = post_attachment.`post_id`
AND attachment.`attachment_type_id`= post_attachment.`attachment_type_id`
AND status.`status_id` = post_status.`status_id`
AND blog_post.`post_id` = post_status.`post_id`
AND post_status.`status_id` = 3









SELECT *FROM post_attachment WHERE post_id=1 AND post_attachment.`attachment_type_id` LIMIT 1




SELECT blog_post.*,user.*,category.*
FROM USER,category,blog_post,STATUS,post_status
WHERE user.`user_id` = blog_post.`user_id`
AND category.`category_id` = blog_post.`category_id`
AND status.`status_id` = post_status.`status_id`
AND post_status.`status_id` = 3





SELECT blog_post.*,user.first_name,user.`last_name`,category.`category_name`
FROM USER,category,blog_post,STATUS,post_status
WHERE user.`user_id` = blog_post.`user_id`
AND category.`category_id` = blog_post.`category_id`
AND blog_post.`post_id` = post_status.`post_id`
AND status.`status_id` = post_status.`status_id`
AND post_status.`status_id` = 3



SELECT post_attachment.`attachment_name`
FROM blog_post,attachment,post_attachment
WHERE blog_post.`post_id` = post_attachment.`post_id`
AND attachment.`attachment_type_id` = post_attachment.`attachment_type_id`
AND blog_post.`post_id` =1



SELECT post_attachment.`attachment_name`
FROM blog_post,attachment,post_attachment
WHERE blog_post.`post_id` = post_attachment.`post_id`
AND attachment.`attachment_type_id` = post_attachment.`attachment_type_id`
AND blog_post.`post_id` =6