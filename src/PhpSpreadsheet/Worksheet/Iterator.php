<?php

namespace PhpOffice\PhpSpreadsheet\Worksheet;

use PhpOffice\PhpSpreadsheet\Spreadsheet;

class Iterator implements \Iterator
{
    /**
     * Spreadsheet to iterate.
     *
     * @var Spreadsheet
     */
    private $subject;

    /**
     * Current iterator position.
     *
     * @var int
     */
    private $position = 0;

    /**
     * Create a new worksheet iterator.
     */
    #[\ReturnTypeWillChange]
    public function __construct(Spreadsheet $subject)
    {
        // Set subject
        $this->subject = $subject;
    }

    /**
     * Destructor.
     */
    #[\ReturnTypeWillChange]
    public function __destruct()
    {
        $this->subject = null;
    }

    /**
     * Rewind iterator.
     */
    #[\ReturnTypeWillChange]
    public function rewind(): void
    {
        $this->position = 0;
    }

    /**
     * Current Worksheet.
     */
    #[\ReturnTypeWillChange]
    public function current(): Worksheet
    {
        return $this->subject->getSheet($this->position);
    }

    /**
     * Current key.
     */
    #[\ReturnTypeWillChange]
    public function key(): int
    {
        return $this->position;
    }

    /**
     * Next value.
     */
    #[\ReturnTypeWillChange]
    public function next(): void
    {
        ++$this->position;
    }

    /**
     * Are there more Worksheet instances available?
     *
     * @return bool
     */
    #[\ReturnTypeWillChange]
    public function valid()
    {
        return $this->position < $this->subject->getSheetCount() && $this->position >= 0;
    }
}
