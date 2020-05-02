import Selector from '@scripts/Utilities/Selector';
import Sides from './Sides/Sides';
import Panel from './Panel';

/**
 * ...
 */
class Panels {

    /**
     * ...
     */
    private sides: Sides;

    /**
     * ...
     *
     * @type Array<Panel>
     */
    private panels = Array<Panel>();

    /**
     * The constructor.
     */
    constructor() {
        this.sides = new Sides();
        this.initPanels();
    }

    /**
     * ...
     *
     * @return void
     */
    private initPanels(): void {
        Selector.element('panel').each((element: Element) => this.panels.push(new Panel(element)));
    }

    /**
     * ...
     *
     * @param target { Array<string> }
     *   ...
     *
     * @return void
     */
    public show(target: Array<string>) {
        this.sides.show(target);
    }

    /**
     * ...
     *
     * @return void
     */
    public hide() {
        this.sides.hide();
    }
}

export default Panels;
