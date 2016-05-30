<?php
/**
 * @author Gaston
 * @version 1.0
 * @created 16-mar-2010 06:00:04 p.m.
 */
class IDS_Response
{

	protected $_response	= '';
	protected $_sended		= false;

	public function __construct()
	{
	}

	public function GetResponse()
	{
		return $this->_response;
	}

	public function Send()
	{
		echo $this->_response;
		$this->_sended = true;
	}

	public function Sended()
	{
		return (bool)$this->_sended;
	}

	/**
	 * 
	 * @param response
	 */
	public function SetResponse($response)
	{
		$this->_response = $response;
	}

}
?>