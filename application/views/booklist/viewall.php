<div>
	<form action="../booklist/add" method="post">
		<input type="text" value="Add a book to list..." onclick="this.value=''" name="library"> <input type="submit" value="Add">
	</form>
</div>

<br/><br/>

<div class="menu">
    <a href="../booklist/">Returned</a>
    <a href="../booklist/">Borrowing</a>
    <a href="../booklist/">Plan to borrow</a>


	<table>
		<tr>
			<th style="width:70px">No.</th>
			<th>Task</th>
		</tr>
	
		<?php $number = 0?>

		<?php foreach ($todo as $todoitem):?>
			<tr>
				<td style="text-align: center;">
					<a class="big" href="../items/view/<?php echo $todoitem['Item']['id']?>/<?php echo strtolower(str_replace(" ","-",$todoitem['Item']['item_name']))?>">
					<span class="item">
					<?php echo ++$number?>
					</span>
					</a>
				</td>
				<td>
					<a class="big" href="../items/view/<?php echo $todoitem['Item']['id']?>/<?php echo strtolower(str_replace(" ","-",$todoitem['Item']['item_name']))?>">
					<span class="item">
					<?php echo $todoitem['Item']['item_name']?>
					</span>
					</a>
				</td>
			</tr>
		<?php endforeach?>

	</table>
</div>
