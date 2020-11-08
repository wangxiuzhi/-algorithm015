<?php
/**
 * PHP version 7
 * trie.php
 * @info
 * @author Daisy
 * @date 2020/11/8 11:54 PM
 */
class Trie
{
    private $tree;
    function __construct()
    {
        $this->tree = new TrieNode(null);
    }

    function insert($word)
    {
        $curNode = $this->tree;
        $n = strlen($word);
        if ($n) {
            for ($i = 0; $i < $n; ++$i) {
                $char = $word[$i];
                if (!isset($curNode->subs[$char])) {
                    $curNode->subs[$char] = new TrieNode($char);
                }
                $curNode = $curNode->subs[$char];
            }

            $curNode->isWord = 1;
        }
    }

    function search($word)
    {
        $curNode = $this->tree;
        $n = strlen($word);
        if ($n) {
            for ($i = 0; $i < $n; ++$i) {
                $char = $word[$i];
                if (!isset($curNode->subs[$char])) {
                    return false;
                }
                $curNode = $curNode->subs[$char];
            }

            return $curNode->isWord;
        }

        return true;
    }

    function startsWith($prefix)
    {
        $curNode = $this->tree;
        $n = strlen($prefix);
        if ($n) {
            for ($i = 0; $i < $n; ++$i) {
                $char = $prefix[$i];
                if (!isset($curNode->subs[$char])) {
                    return false;
                }
                $curNode = $curNode->subs[$char];
            }

            return true;
        }

        return true;
    }
}

class TrieNode
{
    public $val;
    public $subs;
    public $isWord;
    public function __construct($val = null)
    {
        $this->val = $val;
        $this->subs = [];
        $this->isWord = false;
    }
}

$obj = new Trie();

var_dump($obj->insert("apple"));
var_dump($obj->search("apple"));   // 返回 true
var_dump($obj->search("app"));     // 返回 false
var_dump($obj->startsWith("app")); // 返回 true
var_dump($obj->insert("app"));
var_dump($obj->search("app"));     // 返回 true
