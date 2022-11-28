<?php
/*
  Php Program for 
  Binary search on singly linked list
*/
// Linked list node
class LinkNode
{
	public $data;
	public $next;
	public	function __construct($data)
	{
		$this->data = $data;
		$this->next = NULL;
	}
}
class SingleLL
{
	public $head;
	public $tail;
	public	function __construct()
	{
		$this->head = NULL;
		$this->tail = NULL;
	}
	// Add new Node at end of linked list 
	public	function addNode($data)
	{
		$node = new LinkNode($data);
		if ($this->head == NULL)
		{
			$this->head = $node;
		}
		else
		{
			// Append the node at last position
			$this->tail->next = $node;
		}
		$this->tail = $node;
	}
	// Display linked list element
	public	function display()
	{
		if ($this->head == NULL)
		{
			echo("\n Empty linked list".
				"\n");
			return;
		}
		$temp = $this->head;
		//iterating linked list elements
		while ($temp != NULL)
		{
			echo(" ".$temp->data.
				" →");
			// Visit to next node
			$temp = $temp->next;
		}
		echo(" NULL".
			"\n");
	}
	// Returns the middle node in given range
	public	function findMiddle($first, $last)
	{
		// Define some auxiliary variables
		$middle = $first;
		$temp = $first->next;
		// Find middle node
		while ($temp != NULL && $temp != $last)
		{
			$temp = $temp->next;
			if ($temp != $last)
			{
				// Visit to next node
				$middle = $middle->next;
				$temp = $temp->next;
			}
		}
		return $middle;
	}
	// This is performing the binary search operation
	public	function binarySearch($value)
	{
		if ($this->head == NULL)
		{
			echo("\n Empty Linked List");
			return;
		}
		// Define some auxiliary variables
		$last = $this->tail;
		$first = $this->head;
		$result = NULL;
		$mid = $this->head;
		if ($first->data == $value)
		{
			// When search first element
			$result = $first;
		}
		if ($last->data == $value)
		{
			// When searching last element
			$result = $last;
		}
		// This loop is detect given element using binary search
		while ($result == NULL && $mid != NULL && $first != $last)
		{
			// First find middle element
			$mid = $this->findMiddle($first, $last);
			if ($mid == NULL)
			{
				// This is useful when we don't know about initially last node 
				// and search element is largest then last node
				$result = NULL;
			}
			else if ($mid->data == $value)
			{
				// When get the find node
				$result = $mid;
			}
			else if ($mid->data > $value)
			{
				// Select new last node
				$last = $mid;
			}
			else
			{
				// Select new starting node
				$first = $mid->next;
			}
		}
		if ($result != NULL)
		{
			echo("\n Given element ".$value.
				" are Present");
		}
		else
		{
			echo("\n Given element ".$value.
				" are not Present");
		}
	}
}

function main()
{
	$sll = new SingleLL();
	// Sorted linked list
	//  1 → 7 → 13 → 16 → 25 → 29 → 34 → 39 → NULL
	$sll->addNode(1);
	$sll->addNode(7);
	$sll->addNode(13);
	$sll->addNode(16);
	$sll->addNode(25);
	$sll->addNode(29);
	$sll->addNode(34);
	$sll->addNode(39);
	echo("\n Linked List : ");
	$sll->display();
	// Test Cases
	$sll->binarySearch(34);
	$sll->binarySearch(20);
	$sll->binarySearch(42);
	$sll->binarySearch(39);
	$sll->binarySearch(16);
}
main();