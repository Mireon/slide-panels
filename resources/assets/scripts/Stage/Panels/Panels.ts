import Selector from '@scripts/Utilities/Selector';
import Panel from './Panel';

/**
 * ...
 */
class Panels {
    /**
     * ...
     *
     * @type Array<Panel>
     */
    private panels = Array<Panel>();

    /**
     * The constructor.
     */
    public constructor() {
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
     * @param id { string }
     *   ...
     *
     * @return Panel
     */
    public hasPanel(id: string): boolean {
        for (const panel of this.panels) {
            if (panel.isEqualId(id)) {
                return true;
            }
        }

        return false;
    }

    /**
     * ...
     *
     * @param id { string }
     *   ...
     *
     * @return Panel
     */
    public getPanel(id: string): Panel {
        for (const panel of this.panels) {
            if (panel.isEqualId(id)) {
                return panel;
            }
        }

        return null;
    }
}

export default Panels;
